@extends('layouts.app')

@section('content')
    <div class="container">
	<a href="{{ route('catalog') }}" class="btn btn-primary"><i class="fa fa-arrow-left fa-lg"></i> Back to catalog</a>
        <div class="product_page">
            <h1>{{$product->name}}</h1>
            <div class="row">
                <div class="col-sm-6">
                    <img class="product_image_image" src="{{ asset("images/product/{$product->id}/1.jpg") }}"/>
                </div>
                <div class="col-sm-6">
                    <h2>€ {{$product->price}}</h2>
                    <p>{{$product->description}}</p>
                    <table class="table table-striped">
                        @foreach($product->category as $category)
                            <tr><td>{{$category->name}}</td></tr>
                        @endforeach
                    </table>
					<a href="{{ route('addToCart', $product->id) }}" class="btn btn-primary"><i class="fa fa-cart-plus fa-2x"></i> Add to cart</a>
                </div>
            </div>

        </div>
    </div>
@endsection