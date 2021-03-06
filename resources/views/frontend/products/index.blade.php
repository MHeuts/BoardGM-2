@extends('layouts.app')

@section('content')
	<h1 class="display-3 text-center">Products</h1>
	
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 mb-4">
				<div id="accordion">
					<div class="card">
						<h5 class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							Categories <i class="fa pull-right" aria-hidden="true"></i> 
						</h5>
						<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
							<div class="card-body">
								<ul>
								@foreach ($categories as $category)
									@if(count($category['children']) > 0)
										<li>
											<a href="/search?q={{ $category->name }}">{{ $category->name }}</a>
										</li>
										<ul>
										@foreach($category['children'] as $child)
											<li>
												<a href="/search?q={{ $child->name }}">{{ $child->name }}</a>
											</li>
										@endforeach
										</ul>
									@else
										<li>
											<a href="/search?q={{ $category->name }}">{{ $category->name }}</a>
										</li>
									@endif
								@endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-9">
				<div class="container-fluid">
					<div class="row">
						@foreach ($products as $product)
						<div class="col-lg-3 col-md-4 col-sm-12 mb-4">
							<a href="{{ route('displayProduct', $product->id) }}">
							<div class="card">
								<h5 class="card-header">{{ $product->name }}</h5>
								<img class="card-img-top" src="{{ asset("images/product/{$product->id}/1.jpg") }}" alt="Card image">
								{{-- <img class="card-img-top" src="http://via.placeholder.com/800x800" alt="Card image"> --}}
								<div class="card-body">
									<p class="card-text text-truncate">{{ $product->description }}</p>
								</div>
								<div class="card-footer text-muted">
									<a href="{{ route('displayProduct', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View product</a>
									<a href="{{ route('addToCart', $product->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-cart-plus"></i> Add to cart</a>
								</div>
							</div>
							</a>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection