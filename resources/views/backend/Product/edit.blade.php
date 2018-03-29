@extends('layouts.app')
@section('content')
    <h1>edit {{$product->name}}</h1>

    <form action="{{ route('products.update', $product->id) }}">
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" id="name" value="{{$product->name}}">
        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="text" class="form-control" id="price" value="{{$product->price}}">
        </div>
        <button type="submit" class="btn btn-default">save</button>
    </form>
@endsection