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
  // for angular pagination
   public function angular()
  {
    // laravel pagination
    $facilities = Facility::paginate(20);
    return $facilities;
    // {"total":100,"per_page":10,"current_page":1,"last_page":10,"next_page_url":"http:\/\/socialeat.app\/api\/items\/?page=2","prev_page_url":null,"from":1,"to":10,
    // "data":[ {...}, {...}}]
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
