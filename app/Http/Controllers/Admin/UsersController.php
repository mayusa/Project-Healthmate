<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\User;

class UsersController extends Controller {
    // for route: return angular page
    public function view(){
      if(Auth::user()->rid==2 ||Auth::user()->rid==3 )
        return view('admin.users.home');
      else 
        return Redirect::to('/');
    }
    // RESTful methods: return json data. 
    // 并且需要验证用户，保护路径不被匿名访问
    // GET user list
    public function index()
    {
      if(Auth::user()->rid==2 ||Auth::user()->rid==3 )
        return response()->json(User::all());
      else
        return Redirect::to('/');
    }
    // GET 1 user
    public function show($id){
      return response()->json(User::find($id));
    }
    // 暂时没用，交给/User/UserProfileController.php处理
    public function edit($id)
    {
       return Redirect::to('/admin/users');
        //return view('admin.users.edit')->withUser(User::find($id));
    }
    // PUT
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
