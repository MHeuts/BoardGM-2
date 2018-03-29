@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="display-3 text-center">Cart</h1>
		@if(Session::has('cart'))
		<table class="table table-striped">
			<thead>
			<tr>
			  <th scope="col">ID</th>
			  <th scope="col">Name</th>
			  <th scope="col">Description</th>
			  <th scope="col">Price</th>
			  <th scope="col">Quantity</th>
			</tr>
			</thead>
			<tbody>
				@foreach(Session::get('cart') as $item)
				<tr>
					<th scope="row">{{ $item['id'] }}</th>
					<td>{{ $item['name'] }}</td>
					<td>{{ $item['description'] }}</td>
					<td>€{{ $item['price'] }}</td>
					<td>1(test)</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		@endif
	</div>
@endsection