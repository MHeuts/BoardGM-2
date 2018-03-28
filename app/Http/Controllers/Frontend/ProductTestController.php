<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

class ProductTestController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.product.detail');
    }
}