<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\User;
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
    // return response()->json(MyAppointment::all());
    
    $user = User::find(Auth::id());
    return response()->json($user->myAppointment()->where('status', '>', 0)->get()->toArray());
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

//--- update a new appointment -----------------------/

  // goto edit page
  public function edit($id)
  {
    return view('myhealth.appointments.edit')->withCondition(MyAppointment::find($id));//$conditions
  }

  // PUT
  public function update($id)
  {
    $appointment = MyAppointment::find($id);

    $appointment->user_id = Input::get('user_id');
    $appointment->provider_name = Input::get('provider_name');
    $appointment->provider_phone = Input::get('provider_phone');
    $appointment->provider_address = Input::get('provider_address');
    $appointment->provider_specialty = Input::get('provider_specialty');

    $appointment->patient_name = Input::get('patient_name');
    $appointment->appointment_date = Input::get('appointment_date');
    $appointment->appointment_time = Input::get('appointment_time');
    $appointment->reason = Input::get('reason');
    $appointment->notes = Input::get('notes'); //array

    // change status field
    $appointment->status = Input::get('status');

    if ($appointment->save()) {
      return "ok";
    } else {
      return "error";;
    }
  }
}
