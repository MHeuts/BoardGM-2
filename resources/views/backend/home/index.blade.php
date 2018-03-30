@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="display-3 text-center">CMS</h1>
		<a href="{{ route('CMSproducts') }}" class="btn btn-primary">Products</a>
		<a href="{{ route('CMScategories') }}" class="btn btn-primary">Categories</a>
	</div>
@endsection