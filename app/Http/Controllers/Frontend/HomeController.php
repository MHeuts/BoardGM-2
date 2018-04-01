<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return redirect()->route('catalog');
    }
}