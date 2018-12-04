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

}
