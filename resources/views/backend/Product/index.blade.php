@extends('layouts.app')
@section('content')
    <h1>Het overzicht van producten</h1>

    <div class="table-responsive">
        <table class="table-striped">
            <thead>
            <tr>
                <th>Naam</th>
                <th>categorie</th>
                <th>Stock</th>
                <th>acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
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
    <a class="btn btn-primary pull-right" href="{{ route('products.create') }}">
        product toevoegen
    </a>
@endsection