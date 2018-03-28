@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="product_page">
            <h1>{{$product->name}}</h1>
            <div class="row">
                <div class="col-sm-6">
                    <img class="product_image_image" src="{{ asset('images/product/test/1.jpg') }}"/>
                </div>
                <div class="col-sm-6">
                    <h2>€{{$product->price}}</h2>
                    <p>{{$product->description}}</p>
                    <button type="button" class="btn btn-primary btn-lg"><i class="fa fa-cart-plus fa-2x"></i> Add to cart</button>
                </div>
            </div>

        </div>
        <div class="product_reviews">
            <div class="Review_container">
                <div class="review_header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h3>Review Title</h3>
                            <p>review Naam</p>
                        </div>
                        <div class="col-sm-2">
                            <h3>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star text-warning"></i>
								<i class="fa fa-star-half-o text-warning"></i>
								<i class="fa fa-star-o text-warning"></i>
							</h3>
                        </div>
                    </div>

                </div>
                <div class="review_body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
        </div>
    </div>
@endsection