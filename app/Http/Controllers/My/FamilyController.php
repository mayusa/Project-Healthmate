<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\User;
use App\UserFamily;

// using route middleware to check admin auth
class FamilyController extends Controller 
{
  // for route: return angular page
  public function home(){
    return view('myhealth.family.home');
  }

  // GET condition list
  public function index()
  {
    // return response()->json(UserFamily::all());
    $user = User::find(Auth::id());
    return response()->json($user->userFamily()->where('status', '>', 0)->get()->toArray());
  }

  // GET 1 condition -> page
  public function view($id){
    return view('myhealth.family.view')->withCondition(UserFamily::find($id));//withCondition: $condition
  }

  // GET 1 condition RESTful
  public function show($id)
  {
    return response()->json(UserFamily::find($id));
  }

//--- save a new facility -----------------------/

  // goto create form page
  public function create(){
    return view('myhealth.family.create');
  }

  // store a facility to db
  public function store()
  {
    // if using Input::all(), need config Condition Model -> $fillable
    if ( UserFamily::create(Input::all()) ) 
    {
      return Redirect::to('/myhealth/family/home')->with('msg', 'Success');
     } else {
      return Redirect::back()->withInput()->withErrors('db error!');
     }
  }

//--- update a new condition -----------------------/

  // goto edit page
  public function edit($id)
  {
    return view('myhealth.family.edit')->withCondition(UserFamily::find($id));//$conditions
  }

  // PUT
  public function update($id)
  {
    $member = UserFamily::find($id);
    if( Auth::id() != $member->user_id ){
        return "error1";
    }

    $member->first_name = Input::get('first_name');
    $member->last_name = Input::get('last_name');
    $member->gender = Input::get('gender');
    $member->birth = Input::get('birth');
    $member->phone = Input::get('phone');
    $member->email = Input::get('email');
    $member->zip_code = Input::get('zip_code');
    $member->status = Input::get('status');

    if ($member->save()) {
        return "success";
    } else {
        return "error2";
    }

  } // end update
}
