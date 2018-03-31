@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>Orders</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer name</th>
                    <th>Total Products Types</th>
                    <th>Order State</th>
                    <th>Actions</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->user->name}}</td>
                        <td>{{$order->products->count()}}</td>
                        <td>{{$order->state->name}}</td>
                        <td class="table-actions">
                            <a class="btn btn-sm btn-primary" href="{{route('orders.edit', $order->id)}}">
                                View
                            </a>

                        </td>
                        <td>
                            <form class="table-action" method="post" action="{{ route('orders.destroy', $order->id) }}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input role="button" class="btn btn-sm btn-danger table-action" type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>
@endsection