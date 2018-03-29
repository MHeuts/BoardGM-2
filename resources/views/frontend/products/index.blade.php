@extends('layouts.app')

@section('content')
    <h1 class="display-3 text-center">Products</h1>
	<div class="container-fluid">
		<div class="row">
		@foreach ($products as $product)
			<div class="col-lg-2 col-md-4 col-sm-6 mb-4">
				<div class="card">
					<h5 class="card-header">{{ $product->name }}</h5>
					<img class="card-img-top" src="{{ asset("images/product/{$product->id}/1.jpg") }}" alt="Card image">
					{{-- <img class="card-img-top" src="http://via.placeholder.com/800x800" alt="Card image"> --}}
					<div class="card-body">
						<p class="card-text text-truncate">{{ $product->description }}</p>
						
					</div>
					<div class="card-footer text-muted">
						<i class="fa fa-star text-warning align-bottom"></i>
						<i class="fa fa-star text-warning align-bottom"></i>
						<i class="fa fa-star text-warning align-bottom"></i>
						<i class="fa fa-star-half-o text-warning align-bottom"></i>
						<i class="fa fa-star-o text-warning align-bottom"></i>
						<a href="{{ route('displayProduct', $product->id) }}" class="btn btn-primary float-right">View product</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endsection