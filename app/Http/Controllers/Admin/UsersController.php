<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\User;

class UsersController extends Controller {

    // user list
    public function index()
    {
      return response()->json(User::all());
    }

    public function show($id){
      return response()->json(User::find($id));
    }

    // return angular page
    public function view(){
      if(Auth::user()->rid==2 ||Auth::user()->rid==3 )
        return view('admin.users.home');
      else 
        return Redirect::to('/');
    }

    // 暂时没用，交给/User/UserProfileController.php处理
    public function edit($id)
    {
       return Redirect::to('/admin/users');
        //return view('admin.users.edit')->withUser(User::find($id));
    }

    public function update($id)
    {

        $user = User::find($id);
        // change status field
        $user->status = Input::get('status');

        if ($user->save()) {
            return "success";
        } else {
            return "error";;
        }

    }



}
