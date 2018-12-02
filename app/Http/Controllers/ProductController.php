<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Auth;

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
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'description' => 'min:10|max:500',
            'price' => 'required|numeric|between:0.01,1000000',
            'brand' => 'max:50',
            'quantity' => 'required|numeric|between:1,1000000'
        ]);

        $product = new Product([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'brand' => $request->input('brand'),
            'quantity' => $request->input('quantity')
        ]);

        $product->save();

        return redirect('/');

    }

}
