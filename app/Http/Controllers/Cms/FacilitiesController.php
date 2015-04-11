<?php namespace App\Http\Controllers\Cms;

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
		return view('cms.facilities.home');
	}
	// RESTful methods: return json data. 
	// 并且需要验证用户，保护路径不被匿名访问
	// GET user list

	// facility detail page
	public function view($id){
		return view('cms.facilities.view')->withFacility(Facility::find($id));//withFacility: $facility
	}

	// GET 1 facility category
  public function showCate($id){

    return response()->json(Facility_Category::find($id));
  }

	// restful: return all facilities
	public function index()
	{
		return response()->json(Facility::all());
	}

	// get all facility categories
	public function getCategory()
	{
	  return response()->json(Facility_Category::all());
	}

	// goto create form page
	public function create(){
	  return view('cms.facilities.create');
	}

	// store a facility to db
  public function store()
  {
  	// if using Input::all(), need config Facility Model -> $fillable
    if ( Facility::create(Input::all()) ) 
    {
      // return Redirect::back()->with('msg', 'Success');
      return Redirect::to('/cms/facilities/home')->with('msg', 'Success');
     } else {
      return Redirect::back()->withInput()->withErrors('db error!');
     }
  }

	// GET 1 user
	public function show($id)
	{
	  return response()->json(Facility::find($id));
	}

	// goto edit page
  public function edit($id)
  {
		return view('cms.facilities.edit')->withFacility(Facility::find($id));//$facility
  }
	// PUT
	public function update($id)
	{
		$facility = Facility::find($id);

		$facility->facicateid = Input::get('facicateid');
		$facility->facility_name = Input::get('facility_name');
		$facility->intro = Input::get('intro');
		$facility->address = Input::get('address');
		$facility->web_url = Input::get('web_url');
		$facility->tel = Input::get('tel');
		$facility->latitude = Input::get('latitude');
		$facility->longitude = Input::get('longitude');
		$facility->overview = Input::get('overview');
		$facility->pic_url = Input::get('pic_url');
		$facility->facebook_url = Input::get('facebook_url');
		$facility->youtube_url = Input::get('youtube_url');
		$facility->twitter_url = Input::get('twitter_url');
		$facility->google_url = Input::get('google_url');

		if ($facility->save()) {
			return "success";
		} else {
			return "error";;
		}
	}
}
