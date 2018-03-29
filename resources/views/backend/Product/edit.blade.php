@extends('layouts.app')
@section('content')
<div class="container">
    <h1>edit {{$product->name}}</h1>

    <form method="POST" action="{{ route('products.update', $product->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name" required>
        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="text" class="form-control" id="price" value="{{$product->price}}"name="price" required>
        </div>
        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required>{{ $product->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>
</div>
@endsection