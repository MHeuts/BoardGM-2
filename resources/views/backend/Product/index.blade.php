@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Het overzicht van producten</h1>
    <a class="btn btn-primary pull-right" href="{{ route('products.create') }}">
        Add new Product
    </a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Naam</th>
                <th>categorie</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category}}</td>
                    <td>{{$product->in_stock}}</td>
                    <td class="table-actions">
                        <a class="btn btn-sm btn-primary" href="{{route('products.edit', $product->id)}}">
                            Edit
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>

        </table>

    </div>

</div>
@endsection