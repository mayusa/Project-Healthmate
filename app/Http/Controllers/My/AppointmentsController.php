<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\MyAppointment;

// using route middleware to check admin auth
class AppointmentsController extends Controller 
{
  // for route: return angular page
  public function home(){
    return view('myhealth.appointments.home');
  }

  // GET condition list
  public function index()
  {
    return response()->json(MyAppointment::all());
  }

  // for angular pagination
   public function angular()
  {
    // laravel pagination
    $items = MyAppointment::paginate(20);
    return $items;
    // {"total":100,"per_page":10,"current_page":1,"last_page":10,"next_page_url":"http:\/\/socialeat.app\/api\/items\/?page=2","prev_page_url":null,"from":1,"to":10,
    // "data":[ {...}, {...}}]
  }

  // GET 1 condition -> page
  public function view($id){
    return view('myhealth.appointments.view')->withCondition(MyAppointment::find($id));//withCondition: $condition
  }

  // GET 1 condition RESTful
  public function show($id)
  {
    return response()->json(MyAppointment::find($id));
  }

//--- save a new facility -----------------------/

  // goto create form page
  public function create(){
    return view('myhealth.appointments.create');
  }

  // store a facility to db
  public function store()
  {
    // if using Input::all(), need config Condition Model -> $fillable
    if ( MyAppointment::create(Input::all()) ) 
    {
      return Redirect::to('/myhealth/appointments/home')->with('msg', 'Success');
     } else {
      return Redirect::back()->withInput()->withErrors('db error!');
     }
  }

//--- update a new condition -----------------------/

  // goto edit page
  public function edit($id)
  {
    return view('myhealth.appointments.edit')->withCondition(MyAppointment::find($id));//$conditions
  }

  // PUT
  public function update($id)
  {
    $condition = MyAppointment::find($id);

    $condition->userid = Input::get('userid');
    $condition->is_common = Input::get('is_common');
    $condition->title = Input::get('title');
    $condition->content = Input::get('content');
    $condition->fromurl = Input::get('fromurl');

    $condition->description = Input::get('description');
    $condition->symptoms = Input::get('symptoms');
    $condition->tests = Input::get('tests');
    $condition->treatment = Input::get('treatment');
    $condition->img_url = Input::get('img_url'); // array
    $condition->video_url = Input::get('video_url'); //array

    // change status field
    $condition->status = Input::get('status');


    if ($condition->save()) {
      return $condition->is_common;
    } else {
      return "error";;
    }
  }
}
