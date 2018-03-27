@extends('frontend.layout.main')

@section('content')
        <h1>ProductName</h1>
        <div>
            <div class="product_image" style="height: 150px; width: 150px;">
                <img class="product_image_image" style="height: 450px; width: 450px;" src="{{ asset('images/product/test/1.jpg') }}"/>
            </div>
            <div>
                <h2>prijs</h2>
                <p>prduct omschrijving komt hier</p>
            </div>

        </div>
@endsection