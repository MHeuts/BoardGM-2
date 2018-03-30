@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="display-3 text-center">You payed.</h1>
		
		<a href="{{ route('catalog')}}" class="btn btn-primary"><i class="fa fa-arrow-left fa-lg"></i> Back to shop</a>
		
	</div>
@endsection