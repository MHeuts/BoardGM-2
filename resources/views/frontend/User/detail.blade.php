@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{ route('home.index') }}" class="btn btn-primary mb-4"><i class="fa fa-arrow-left fa-lg"></i>Exit</a>
        <div>
            <h1>{{$user->name}}</h1>
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <p class="form-control-static">{{$user->email}}</p>
            </div>

                <label class="control-label col-sm-2" for="address">Address:</label>
            <div class="col-sm-10">
                <p  class="form-control-static">{{$user->address->street}} {{$user->address->number}}</p>
                <p class="form-control-static">{{$user->address->zipcode}} {{$user->address->city}}</p>
            </div>

        </div>
        <!--
        <button type="submit" class="btn btn-primary" form="userForm">Edit</button>
        <button type="submit" class="btn btn-danger" form="userForm">Change Password</button>
        -->
        <div class="user_orders">
        <h1>Orders</h1>

        @foreach($user->orders as $order)
            <h2>{{$order->id}}</h2>
            <p>{{$order->state->name}}</p>
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
        @endforeach
        </div>
    </div>
@endsection