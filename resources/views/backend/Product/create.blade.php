@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('CMSproducts') }}" class="btn btn-primary"><i class="fa fa-arrow-left fa-lg"></i> Back to index</a>
    <form method="POST" action="{{ route('products.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="category">Catagory:</label>

            <select class="selectpicker"  name="category[]" multiple>
                @foreach($categories as $catagory)
                    <option value="{{$catagory->id}}"> {{$catagory->name}}</option>
                @endforeach
            </select>

        </div>
        <button type="submit" class="btn btn-primary">save</button>
    </form>

</div>
@endsection