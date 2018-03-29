@extends('layouts.app')
@section('content')

    <form method="post" action="{{ route('products.create') }}">
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" class="form-control" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="text" class="form-control" id="price" value="{{ old('price') }}">
        </div>
        <button type="submit" class="btn btn-default">save</button>
    </form>
@endsection