@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="display-3 text-center">Results</h1>
		
		<table class="table table-striped">
			<tbody>
				@if(count($products) > 0)
					@foreach ($products as $product)
					<tr>
						<th scope="row">
							<img class="search-product-img" src="{{ asset("images/product/{$product->id}/1.jpg") }}"/>
						</th>
						<td>
							<a href="{{ route('displayProduct', $product->id) }}">
								{{ $product->name }}
							</a>
						</td>
						<td>
							€ {{ $product->price }}
						</td>
						<td>
							<i class="fa fa-star text-warning"></i>
							<i class="fa fa-star text-warning"></i>
							<i class="fa fa-star text-warning"></i>
							<i class="fa fa-star-half-o text-warning"></i>
							<i class="fa fa-star-o text-warning"></i>
						</td>
						<td>
							<a href="{{ route('displayProduct', $product->id) }}" class="btn btn-primary mr-2"><i class="fa fa-eye"></i> View product</a>
							<a href="{{ route('addToCart', $product->id) }}" class="btn btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</a>
						</td>
					</tr>
					@endforeach
				@else
						<h3 class="text-center">No results found.</h3>
				@endif
			</tbody>
		</table>
		
	</div>
@endsection