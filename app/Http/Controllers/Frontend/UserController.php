<?php
/**
 * Created by PhpStorm.
 * User: marijnheuts
 * Date: 01/04/2018
 * Time: 09:54
 */

namespace App\Http\Controllers\Frontend;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController
{
    public function detail()
    {
        $user = Auth::user();
        return view('frontend.user.detail', compact('user'));
    }

    public function edit(){
        $user = Auth::user();
        return view('frontend.user.edit', compact('user'));
    }

    public function update(Request $request){
        $logedUser = Auth::user();

        $user = User::findOrFail($logedUser->id);
        $user->update($request->all());
        $user->address()->update($request->all());

        return redirect(route('userDetails'));
    }
}