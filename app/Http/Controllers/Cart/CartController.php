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
	
	public function removeFromCart($id) {
		foreach(Session::get('cart.items') as $index=>$item) {
			if ($id == $item['id']) {
				Session::forget('cart.items.'.$index);
				$this->calcTotalQtyTotalPrice();
				
				return redirect()->route('cart');
			}
		}
	}
	
	public function updateQty(Request $request, $id) {
		$request->validate([
			'qty' => 'required|min:1',
		]);
		
		$product = [];
		$qty = $request->input('qty');
		
		foreach(Session::get('cart.items') as $index=>&$item) {
			$product = $item;
			if ($id == $product['id']) {
				$product['qty'] = $qty ;
				Session::put('cart.items.'.$index, $product);
				$this->calcTotalQtyTotalPrice();
				
				return redirect()->route('cart');
			}
		}
	}
	
	function calcTotalQtyTotalPrice(){
		$newTotalQty = 0;
		$newTotalPrice = 0;
		
		foreach(Session::get('cart.items') as $index=>$item) {
			$newTotalQty += $item['qty'];
			$newTotalPrice += $item['qty'] * $item['price'];
		}
		
		Session::put('cart.totalQty', $newTotalQty);
		Session::put('cart.totalPrice', $newTotalPrice);
		
		if($newTotalQty == 0){
			Session::forget('cart');
		}
	}
	
	public function addToCart($id)
	{
		$product = [];
		
		// Product already in cart
		if(Session::has('cart.items')){
			foreach(Session::get('cart.items') as $index=>&$item) {
				$product = $item;
				if ($id == $product['id']) {
					++$product['qty'];
					Session::put('cart.items.'.$index, $product);
					
					$this->calcTotalQtyTotalPrice();
					
					return redirect()->route('cart');
				}
			}
		}
		
		// Product NOT already in cart
		$product_from_db = Product::findOrFail($id);
		$product['id'] = $id;
		$product['name'] = $product_from_db->name;
		$product['description'] = $product_from_db->description;
		$product['price'] = $product_from_db->price;
		$product['qty'] = 1;
		
		Session::push('cart.items', $product);
		
		$this->calcTotalQtyTotalPrice();
		
		return redirect()->route('cart');
	}
}
