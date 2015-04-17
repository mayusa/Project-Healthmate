<?php namespace App\Http\Controllers\Info;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect, Input, Auth;
use App\Doctor;
use App\Specialty;

// using route middleware to check admin auth
class DoctorsController extends Controller {
    // for route: return angular page
    public function home(){
        return view('info.doctors.home');
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
      return view('info.doctors.view')->withDoctor(Doctor::find($id));//: $doctor
    }

    public function show($id){
      return response()->json(Doctor::find($id));
    }

    public function showSpecialty($id){
      return response()->json(Specialty::find($id));
    }
    
}
