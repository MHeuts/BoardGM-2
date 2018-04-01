<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function index()
    {
		$products = Product::all();
		$categories = Category::tree();
        return view('frontend.products.index', compact('products', 'categories'));
    }
	
    public function displayProduct($id){
        $product = Product::find($id);
        return view('frontend.products.detail', compact('product'));
    }
}
