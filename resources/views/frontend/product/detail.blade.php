@extends('frontend.layout.main')

@section('content')
    <div class="container">
        <div class="product_page">
            <h1>Battlestar Galactica</h1>
            <div class="row">
                <div class="col-sm-6">
                    <img class="product_image_image" src="{{ asset('images/product/test/1.jpg') }}"/>
                </div>
                <div class="col-sm-6">
                    <h2>49,99</h2>
                    <p>prduct omschrijving komt hier: \n
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                    <button type="button" class="btn btn-primary">Add to Basket</button>
                </div>
            </div>

        </div>
        <div class="product_reviews">
            <div class="Review_container">
                <div class="review_header">
                    <div class="row">
                        <div class="col-sm-10">
                            <h3>Review Title</h3>
                            <p>review Naam</p>
                        </div>
                        <div class="col-sm-2">
                            STARS
                        </div>
                    </div>

                </div>
                <div class="review_body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
        </div>
    </div>
@endsection