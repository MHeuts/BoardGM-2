<?php
/**
 * Created by PhpStorm.
 * User: marijnheuts
 * Date: 28/03/2018
 * Time: 17:03
 */

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;


class ProductController extends Controller
{
    public function index()
    {
        return view('frontend.product.detail');
    }

    public function displayProduct($id){
        $product = Product::findOrFail($id);
        return view('frontend.product.detail', compact('product'));
    }
}