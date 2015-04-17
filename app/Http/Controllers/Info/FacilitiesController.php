<?php namespace App\Http\Controllers\Info;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\Facility;
use App\Facility_Category;

// using route middleware to check admin auth
class FacilitiesController extends Controller {
	// for route: return angular page
	public function home(){
		return view('info.facilities.home');
	}

	// restful: return all facilities
	public function index()
	{
		return response()->json(Facility::all());
	}

	// facility detail page
	public function view($id){
		return view('info.facilities.view')->withFacility(Facility::find($id));//withFacility: $facility
	}

	// GET 1 facility category
  public function showCate($id){

    return response()->json(Facility_Category::find($id));
  }

	// get all facility categories
	public function getCategory()
	{
	  return response()->json(Facility_Category::all());
	}


}
