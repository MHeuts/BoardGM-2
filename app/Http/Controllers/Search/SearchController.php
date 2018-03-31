<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;

class SearchController extends Controller
{
	public function search(Request $request){
		if($request->has('q')){

			$products = Product::search($request->q)->get();
		}

		return view('frontend.search.index', compact('products'));
	}
}
