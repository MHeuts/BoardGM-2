<?php
/**
 * Created by PhpStorm.
 * User: marijnheuts
 * Date: 31/03/2018
 * Time: 09:01
 */

namespace App\Http\Controllers\Backend;


use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('backend.user.edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach();
        foreach ($request->all(['roles']) as $roleid){
            if($roleid == null){
                return redirect()->back();
            }
            $role = Role::findOrFail($roleid);
            $user->roles()->attach($role);
        }
        $user->update($request->all());
        $user->address()->update($request->all());

        return redirect(route('users.index'));
    }
}