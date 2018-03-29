@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="display-3 text-center">Homepage</h1>
		<a href="{{ route('catalog') }}" class="btn btn-primary">View catalog</a>
	</div>
@endsection