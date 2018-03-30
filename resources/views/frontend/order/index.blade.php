@extends('layouts.app')

@section('content')
	<div class="container">
		<h1 class="display-3 text-center">Order Details</h1>
		
		
		<div class="row justify-content-md-center">
			<div class="col">
				<div class="card mb-4" >
					<div class="card-header">
					Delivery address
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><b>Street:</b> {{ $address->street }} {{ $address->number }}</li>
						<li class="list-group-item"><b>Zipcode:</b> {{ $address->zipcode }}</li>
						<li class="list-group-item"><b>City:</b> {{ $address->city }}</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6">
			</div>
			<div class="col">
				<div class="card mb-4">
					<div class="card-header">
					Payment options
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="form-check">
								<input class="form-check-input" name="pay" type="radio" id="paypal" checked>
								<label class="form-check-label" for="paypal"><i class="fa fa-cc-paypal fa-2x"></i> PayPal</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" name="pay" type="radio" id="mastercard">
								<label class="form-check-label" for="mastercard"><i class="fa fa-cc-mastercard fa-2x"></i> Mastercard</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" name="pay"type="radio" id="visa">
								<label class="form-check-label" for="visa"><i class="fa fa-cc-visa fa-2x"></i> Visa</label>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		
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
				@foreach( Session::get('cart.items') as $item)
				<tr>
					<th scope="row">{{ $item['id'] }}</th>
					<td>{{ $item['name'] }}</td>
					<td>{{ $item['description'] }}</td>
					<td>€{{ number_format($item['price'] * $item['qty'], 2) }}</td>
					<td>{{ $item['qty'] }}</td>
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
				</tr>
			</tfoot>
		</table>
		@endif
		
		<a href="{{ route('payment')}}" class="btn btn-primary btn-lg float-right"><i class="fa fa-credit-card fa-lg"></i> Go to payment</a>
		
	</div>
@endsection