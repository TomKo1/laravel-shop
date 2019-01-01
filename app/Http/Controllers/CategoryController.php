<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.index')->with('categories', $categories);
    }

    /**
     * getCreateCategory
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     *  postCreateCategory
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //'image|mimes:jpeg,png,jpg,gif,svg|max:2048',]);
        $this->validate($request, [
            'name' => 'required|min:5|max:255',
            'description' => 'min:10|max:500',
            'image' => 'required|image|mimes:png,jpeg,gif,jpg|max:2048'
        ]);


        $file = $request->file('image');
        $filename = now()->timestamp.$file->getClientOriginalName();

        $image_resize = Image::make($file->getRealPath());
        $image_resize->resize(300, 300);
        $image_resize->save(public_path('storage/' .$filename));

        $category = new Category([
            'name' =>   $request->input('name'),
            'description' => $request->input('description'),
            'image' => $filename
        ]);

        $category->save();

        return redirect('/');
    }


    public function getProducts(Request $request, $id) {
        $category = Category::find($id);
        return view('category.products', ['category' => $category, 'products' => $category->products]);
    }


    public function destroy($id) {
        $category = Category::findOrFail($id);
        // deleta associated images from storage
        Storage::delete('public/'.$category->image);
        $category->delete();

        return redirect('/');
    }

}
