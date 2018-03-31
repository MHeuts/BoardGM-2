@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('orders.index') }}" class="btn btn-primary mb-4"><i class="fa fa-arrow-left fa-lg"></i> Back to index</a>
        <h1>Order: </h1>
        <form method="POST" action="{{ route('orders.update', $order->id) }}" id="OrderForm" class="form-horizontal">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Name:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$order->user->name}}</p>
                </div>
                <label class="control-label col-sm-2" for="email">Adres:</label>
                <div class="col-sm-10">
                    <p class="form-control-static">{{$order->user->address->street}} {{$order->user->address->number}}</p>
                    <p class="form-control-static">{{$order->user->address->zipcode}} {{$order->user->address->city}}</p>
                </div>
            </div>
            <div class="form-group">
                <label for="parent">Order State: </label>
                <select class="selectpicker"  name="state">
                    @foreach($orderStates as $orderState)
                        <option value="{{$orderState->id}}" @if($orderState->id == $order->order_state_id) selected="selected" @endif> {{$orderState->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>quantity</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td>{{$orderDetail->product->id}}</td>
                            <td>{{$orderDetail->product->name}}</td>
                            <td>{{$orderDetail->qty}}</td>
                            <td>€ {{ number_format($orderDetail->product->price * $orderDetail->qty, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </form>
        <button type="submit" class="btn btn-primary" form="OrderForm">Save</button>
    </div>
@endsection