@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('CMSproducts') }}" class="btn btn-primary mb-4"><i class="fa fa-arrow-left fa-lg"></i> Back to index</a>
    <h1>Edit: </h1>
    <h2>{{$product->name}}</h2>
    <form method="POST" action="{{ route('products.update', $product->id) }}" id="productForm">
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
        <div class="form-group">
            <label for="category">Category:</label>

                <select class="selectpicker"  name="category[]" multiple>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}" @foreach($product->category as $pcategory) @if($pcategory->id == $category->id) selected="selected" @break
                                @endif @endforeach> {{$category->name}}</option>
                    @endforeach
                </select>

        </div>
    </form>
	<hr>
    <form class="mb-4" enctype="multipart/form-data" action="{{ route('products.photo', $product->id) }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="photo">Upload photos:</label>
            <input type="file" id="photo" name="photo" />
        </div>
        <input type="submit" value="Upload" />
    </form>
	<hr>
	<button type="submit" class="btn btn-primary" form="productForm">Save</button>
</div>
@endsection