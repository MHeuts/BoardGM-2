<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Session;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {	
        return view('frontend.cart.index');
    }
	
	public function checkout() {
		Session::forget('cart');
		return redirect('/products');
	}
	
	public function removeFromCart($id) {
		foreach(Session::get('cart.items') as $index=>$item) {
			if ($id == $item['id']) {
				$currentTotalQty = Session::get('cart.totalQty');
				Session::put('cart.totalQty', $currentTotalQty -= $item['qty']);
				$currentTotalPrice = Session::get('cart.totalPrice');
				Session::put('cart.totalPrice', $currentTotalPrice -= ($item['price'] * $item['qty']));
				
				Session::forget('cart.items.'.$index);
				
				break;
			}
		}
		
		return redirect('/cart');
	}
	
	public function updateQty($qty) {
		dd($qty);
	}
	
	public function addToCart($id)
	{
		$product = [];
		
		if(Session::has('cart.items')){
			foreach(Session::get('cart.items') as $index=>&$item) {
				$product = $item;
				if ($id == $product['id']) {
					++$product['qty'];
					Session::put('cart.items.'.$index, $product);
					
					$currentTotalQty = Session::get('cart.totalQty');
					Session::put('cart.totalQty', ++$currentTotalQty);
					$currentTotalPrice = Session::get('cart.totalPrice');
					Session::put('cart.totalPrice', $currentTotalPrice += $product['price']);
					
					return redirect('/cart');
				}
			}
		}
		
		$product_from_db = Product::findOrFail($id);
		$product['id'] = $id;
		$product['name'] = $product_from_db->name;
		$product['description'] = $product_from_db->description;
		$product['price'] = $product_from_db->price;
		$product['qty'] = 1;
		
		Session::push('cart.items', $product);
		
		
		
		$currentTotalQty = Session::get('cart.totalQty');
		Session::put('cart.totalQty', ++$currentTotalQty);
		$currentTotalPrice = Session::get('cart.totalPrice');
		Session::put('cart.totalPrice', $currentTotalPrice += $product['price']);
		
		return redirect('/cart');
	}
}
