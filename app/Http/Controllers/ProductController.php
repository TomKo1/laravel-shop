<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Auth;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
use App\Order;


class ProductController extends Controller
{

    public function getProducts() {
        $products = Product::all();
        return view('product.index')->with('products', $products);
    }


    public function newProduct() {
        return view('product.new');
    }

    public function createProduct(Request $request) {
        // TODO: make request objects & change 2000 to be 2MB
        //TODO: make specific message only for 'images.*.max
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'description' => 'min:10|max:500',
            'price' => 'required|numeric|between:0.01,1000000',
            'brand' => 'max:50',
            'quantity' => 'required|numeric|between:1,1000000',
            'images' => 'required',
            'images.*' => 'image|mimes:png,jpeg,gif,jpg|max:2048'
        ],
        [
            'images.*' => 'Images be in png / jpeg / gif / jpg format and have up to 2 MB'
        ]);

        $files = $request->file('images');
        $filePathsArray = [];
        $productName = $request->input('name');
        // it is also possible to upload images to separate table
        foreach($files as $file) {
            $filename = now()->timestamp.$file->getClientOriginalName();
            $file->storeAs('public', $filename);
            array_push($filePathsArray, $filename);
        }

        $product = new Product([
            'name' => $productName,
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'quantity' => $request->input('quantity'),
            'images' => $filePathsArray
        ]);

        $product->save();

        return redirect('/');
    }

    public function getAddToCart(Request $request, $id) {
        error_log('witam');
        $product = Product::find($id);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->route('product.index');
    }

    public function getShoppingCart(Request $request) {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function removeFromCart(Request $request, $id, $quantity) {
        // fetch old cart
        $cart = Session::get('cart');
        $product = Product::find($id);

        $cart->removeProduct($product, $id, $quantity);
        if($cart->isEmpty()) {
            Session::forget('cart');
        } else {
            Session::put('cart', $cart);
        }

        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function postCheckout(Request $request) {
        if(!Session::has('cart')) {
            return redirect()->route('product.shoppingCart');
        }

        $secretKey = env('SECRET_STRIPE_KEY', false);
        if($secretKey == false) {
           // return view();
           // do something
        }
        $cart = Session::get('cart');
        Stripe::setApikey($secretKey);

        try {
            $charge = Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => $request->input('stripeToken'),
                "description"=>"Test Charge"
            ));

        // get current user
        $current_user = Auth::user();

        // save the order
        $order = new Order([
            'address' => 'CHANGE ME: Sample address',
            'name' => $current_user->email,
            'payment_id' => $charge->id,
            'cart' => serialize($cart)
        ]);

        $current_user->orders()->save($order);

        } catch (\Exception $e) {
            error_log($e);
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }



        Session::forget('cart');

        return redirect()->route('product.index')->with('success', 'Successfully purchased products!');
    }

    public function getCheckout() {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $totalPrice = $cart->totalPrice;
        return view('shop.checkout', ['totalPrice' => $totalPrice]);
    }

}
