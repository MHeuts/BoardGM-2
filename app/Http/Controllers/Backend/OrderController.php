<?php
/**
 * Created by PhpStorm.
 * User: marijnheuts
 * Date: 31/03/2018
 * Time: 09:01
 */

namespace App\Http\Controllers\backend;


use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\OrderState;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $orders = Order::all();
        return view('backend.order.index', compact('orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $orderStates = OrderState::all();
        return view('backend.order.edit', compact('order', 'orderStates'));
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
        $order = Order::findOrFail($id);
        $order->order_state_id = $request->state;
        $order->update();
        return redirect(route('orders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return redirect(route('orders.index'));
    }
}