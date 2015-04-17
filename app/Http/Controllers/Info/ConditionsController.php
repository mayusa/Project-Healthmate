<?php namespace App\Http\Controllers\Info;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\Condition;

// using route middleware to check admin auth
class ConditionsController extends Controller 
{
  // for route: return angular page
  public function home(){
    return view('info.conditions.home');
  }

  // GET condition list
  public function index()
  {
    return response()->json(Condition::all());
  }

  // GET 1 condition -> page
  public function view($id){
    return view('info.conditions.view')->withCondition(Condition::find($id));//withCondition: $condition
  }

  // GET 1 condition RESTful
  public function show($id)
  {
    return response()->json(Condition::find($id));
  }


}
