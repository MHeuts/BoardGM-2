@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Products</h1>
    <a class="btn btn-primary pull-right" href="{{ route('products.create') }}">
        Add new product
    </a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>€ {{$product->price}}</td>
                    <td>{{$product->in_stock}}</td>
                    <td class="table-actions">
                        <a class="btn btn-sm btn-primary" href="{{route('products.edit', $product->id)}}">
                            Edit
                        </a>

                    </td>
                    <td>
                        <form class="table-action" method="post" action="{{ route('products.destroy', $product->id) }}">
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