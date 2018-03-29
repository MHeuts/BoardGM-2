<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
		$items = session('cart');
		
        return view('frontend.cart.index', compact('items'));
    }
	
	public function addToCart(Request $request, $id)
	{
		$product_from_db = Product::findOrFail($id);
		$product = [];
		$product['id'] = $id;
		$product['name'] = $product_from_db->name;
		$product['description'] = $product_from_db->description;
		$product['price'] = $product_from_db->price;
		$request->session()->push('cart', array_merge((array)Session::get('cart',[]), $product));  
		return redirect('/cart');
	}
}
