@extends('layouts.app')

@section('content')
    <h1 class="display-3 text-center">Products</h1>
	<div class="container-fluid">
		<div class="row">
		@foreach ($products as $product)
			<div class="col-lg-2 col-md-4 col-sm-6 mb-4">
				<div class="card">
					<img class="card-img-top" src="{{ asset("images/product/{$product->id}/1.jpg") }}" alt="Card image">
					{{-- <img class="card-img-top" src="http://via.placeholder.com/800x800" alt="Card image"> --}}
					<div class="card-body">
						<h4 class="card-title">{{ $product->name }}</h4>
						<p class="card-text text-truncate">{{ $product->description }}</p>
						<a href="{{ route('displayProduct', $product->id) }}" class="btn btn-primary">View product</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
@endsection