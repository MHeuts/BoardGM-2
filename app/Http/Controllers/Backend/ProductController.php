<?php
/**
 * Created by PhpStorm.
 * User: marijnheuts
 * Date: 27/03/2018
 * Time: 13:25
 */

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;


class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all(['id', 'name']);
        return view('backend.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $product = new Product($request->all());
        $product->save();

        foreach ($request->all(['category']) as $categoryid){
            $category = Category::findOrFail($categoryid);
            $product->category()->attach($category);
        }

        return redirect(route('products.index'));
    }

    public function show(Request $request){
        dd($request);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $path = public_path().'/images/product/' . $id;
        if(!file::exists($path)) {
            File::makeDirectory($path);
        }

        $product = Product::findOrFail($id);
        $categories = Category::all(['id', 'name']);
        return view('backend.product.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->category()->detach();

        foreach ($request->all(['category']) as $categoryid){
            $category = Category::findOrFail($categoryid);
            $product->category()->attach($category);
        }
        $product->update($request->all());
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route('products.index'));
    }

    public function uploadPhoto(Request $request, $id)
    {
        $path = 'product/' . $id;
        $file = $request->photo;
        if ($file != null) {
            $path = Storage::disk('public_uploads')->putFileAs($path, $file, '1.jpg');
        }
        return redirect(route('products.index'));
    }
}