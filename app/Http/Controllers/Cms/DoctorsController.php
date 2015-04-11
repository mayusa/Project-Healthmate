<?php namespace App\Http\Controllers\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\Doctors;
use App\Doctor_Specialty;
use App\Specialty;

// using route middleware to check admin auth
class DoctorsController extends Controller {
    // for route: return angular page
    public function home(){
        return view('cms.doctors.home');
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

        $user->name = Input::get('name');
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->gender = Input::get('gender');
        $user->phone = Input::get('phone');
        $user->address = Input::get('address');
        $user->zip_code = Input::get('zip_code');
        $user->birth = Input::get('birth');

        // change status field
        $user->status = Input::get('status');


        if ($user->save()) {
            return "success";
        } else {
            return "error";;
        }
    }
}
