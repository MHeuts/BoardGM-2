<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductsController extends Controller
{
    public function index()
    {
		$products = Product::all();
        return view('frontend.products.index', compact('products'));
    }
	
    public function displayProduct($id){
        $product = Product::find($id);
        return view('frontend.products.detail', compact('product'));
    }
}
