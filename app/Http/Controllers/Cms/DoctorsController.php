<?php namespace App\Http\Controllers\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\Doctor;
use App\Specialty;

// using route middleware to check admin auth
class DoctorsController extends Controller {
    // for route: return angular page
    public function home(){
        return view('cms.doctors.home');
    }

    // GET doctor list --------------------------------------- //
    public function index()
    {
        return response()->json(Doctor::all());
    }

    public function getSpecialty()
    {
        return response()->json(Specialty::all());
    }

    // doctor detail page ---------------------------------- //

    public function view($id){
      return view('cms.doctors.view')->withDoctor(Doctor::find($id));//: $doctor
    }

    public function show($id){
      return response()->json(Doctor::find($id));
    }

    public function showSpecialty($id){
      return response()->json(Specialty::find($id));
    }

    //--- save a new doctor -----------------------/
    // goto create form page
    public function create(){
      return view('cms.doctors.create');
    }

    // store a doctor to db
    public function store()
    {
      // if using Input::all(), need config Doctor Model -> $fillable
      if ( Doctor::create(Input::all()) ) 
      {
        // return Redirect::back()->with('msg', 'Success');
        return Redirect::to('/cms/doctors/home')->with('msg', 'Success');
       } else {
        return Redirect::back()->withInput()->withErrors('db error!');
       }
    }

  // goto edit page
    public function edit($id)
    {
      return view('cms.doctors.edit')->withDoctor(Doctor::find($id));//$doctor
    }

    // PUT
    public function update($id)
    {
        $doctor = Doctor::find($id);

        $doctor->speciid = Input::get('speciid');
        $doctor->doctor_name = Input::get('doctor_name');
        $doctor->intro = Input::get('intro');
        $doctor->address = Input::get('address');
        $doctor->latitude = Input::get('latitude');
        $doctor->longitude = Input::get('longitude');
        $doctor->overview = Input::get('overview');
        $doctor->background = Input::get('background');
        
        $doctor->appointments = Input::get('appointments');
        $doctor->pic_url = Input::get('pic_url');

        // change status field
        // $doctor->status = Input::get('status');


        if ($doctor->save()) {
            return "success";
        } else {
            return "error";;
        }
    }
}
