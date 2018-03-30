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
			  <th scope="col">Actions</th>
			</tr>
			</thead>
			<tbody>
				@foreach( Session::get('cart.items') as $item)
				<tr>
					<th scope="row">{{ $item['id'] }}</th>
					<td>{{ $item['name'] }}</td>
					<td>{{ $item['description'] }}</td>
					<td>€{{ $item['price'] * $item['qty'] }}</td>
					<td>
						<form id="qtyForm" method="POST" action="{{ route('updateQty', $item['id']) }}">
							{{ csrf_field() }}
							<input type="number" id="qty" name="qty" min="1" value="{{ $item['qty'] }}"/>
						</form>
					</td>
					<td>
						<button class="btn btn-primary" type="submit" form="qtyForm"><i class="fa fa-pencil"></i> Update quantity</button>
						<a href="{{ route('removeFromCart', $item['id']) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Remove from cart</a>
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td class="h5"><b>Total price: </b> €{{ number_format(Session::get('cart.totalPrice'), 2) }}</td>
					<td class="h5"><b>Total quantity: </b>{{ Session::get('cart.totalQty') }}</td>
					<td></td>
				</tr>
			</tfoot>
		</table>
		@endif
		
		<a href="{{ route('catalog')}}" class="btn btn-primary"><i class="fa fa-arrow-left fa-lg"></i> Back to shop</a>
		
		@if(Session::has('cart'))
		<a href="{{ route('checkout')}}" class="btn btn-primary btn-lg float-right"><i class="fa fa-money fa-2x"></i> Checkout</a>
		@endif
		
	</div>
@endsection