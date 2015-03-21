<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use Redirect, Input, Auth;
use App\User;

class UsersController extends Controller {

    /**
     * @return $this
     */
    public function index()
    {
        return view('admin.users.index')->withUsers(User::all());

    }
    public function edit($id)
    {
        return view('admin.users.edit')->withUser(User::find($id));
    }

    public function update(Request $request,$id)
    {

        $user = User::find($id);
        $user->status = Input::get('status');

        if ($user->save()) {
            return Redirect::to('/admin/users');
        } else {
            return Redirect::back()->withInput()->withErrors('update error！');
        }

    }



}
