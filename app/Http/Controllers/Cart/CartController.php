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
				Session::forget('cart.items.'.$index);
				$this->calcTotalQtyTotalPrice();
				
				return redirect('/cart');
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
				
				return redirect('/cart');
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
					
					$this->calcTotalQtyTotalPrice();
					
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
		
		$this->calcTotalQtyTotalPrice();
		
		return redirect('/cart');
	}
}
