<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use Session;
use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetails;

class OrderController extends Controller
{
    public function index()
    {
		$address = Address::find(Auth::user()->address_id);
		
        return view('frontend.order.index', compact('address'));
    }
	
	public function payment()
    {
		$order = new Order;
		$order->user_id = Auth::user()->id;
		$order->order_state_id = 1;
		$order->save();
		
		foreach(Session::get('cart.items') as $item) {
			$orderDetails = new OrderDetails;
			$orderDetails->order_id = $order->id;
			$orderDetails->product_id = $item['id'];
			$orderDetails->qty = $item['qty'];
			$orderDetails->save();
		}
		
		Session::forget('cart');
		
		return redirect()->route('payed');
    }
	
	public function payed()
    {
		return view('frontend.order.payed');
    }
}
