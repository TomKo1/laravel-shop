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
        // TODO: make request objects & change 2000 to be 2MB
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'description' => 'min:10|max:500',
            'price' => 'required|numeric|between:0.01,1000000',
            'brand' => 'max:50',
            'quantity' => 'required|numeric|between:1,1000000',
            'images' => 'required',
            'image.*' => 'image|mimes:png,jpeg,gif,jpg|max:2048'
        ]);

        error_log('Before storing image!');
        $files = $request->file('images');
        foreach($files as $file) {
            // create name
            $filename = now().$request->input('name').'.'.$file->extension();
            // stroe this image using this name
            $file->storeAs('public', $filename);
            // append the path to the image to the array
        }

        // Of course, once a file has been
        // stored and the symbolic link has
        // been created, you can create a
        // URL to the files using the asset helper:
        // echo asset('storage/file.txt');

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
