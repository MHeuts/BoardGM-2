<?php
/**
 * Created by PhpStorm.
 * User: marijnheuts
 * Date: 27/03/2018
 * Time: 13:25
 */

namespace App\Http\Controllers\backend;

use App\Models\Product;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('backend.product.index', compact('products'));
    }
}