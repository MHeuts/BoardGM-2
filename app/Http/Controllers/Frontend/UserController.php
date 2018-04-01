<?php
/**
 * Created by PhpStorm.
 * User: marijnheuts
 * Date: 01/04/2018
 * Time: 09:54
 */

namespace App\Http\Controllers\Frontend;


use Illuminate\Support\Facades\Auth;

class UserController
{
    public function details()
    {
        $user = Auth::user();
        return view('frontend.user.detail', compact('user'));
    }
}