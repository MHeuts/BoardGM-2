@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="display-3 text-center">CMS</h1>
		<a href="{{ route('products.index') }}" class="btn btn-primary">Products</a>
		<a href="{{ route('categories.index') }}" class="btn btn-primary">Categories</a>
		<a href="{{ route('orders.index') }}" class="btn btn-primary">Orders</a>
	</div>
@endsection