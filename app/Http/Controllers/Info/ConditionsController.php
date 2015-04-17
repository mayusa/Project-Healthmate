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

  // for angular pagination
   public function angular()
  {
    // laravel pagination
    $conditions = Condition::paginate(20);
    return $conditions;
    // {"total":100,"per_page":10,"current_page":1,"last_page":10,"next_page_url":"http:\/\/socialeat.app\/api\/items\/?page=2","prev_page_url":null,"from":1,"to":10,
    // "data":[ {...}, {...}}]
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
