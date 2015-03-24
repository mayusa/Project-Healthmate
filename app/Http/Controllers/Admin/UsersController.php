<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\User;

// using route middleware to check admin auth
class UsersController extends Controller {
    // for route: return angular page
    public function view(){
        return view('admin.users.home');
    }
    // RESTful methods: return json data. 
    // 并且需要验证用户，保护路径不被匿名访问
    // GET user list
    public function index()
    {
        return response()->json(User::all());
    }
    // GET 1 user
    public function show($id){
      return response()->json(User::find($id));
    }
    // 暂时没用，交给/User/UserProfileController.php处理
    public function edit($id)
    {
       return Redirect::to('/admin/users');
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
