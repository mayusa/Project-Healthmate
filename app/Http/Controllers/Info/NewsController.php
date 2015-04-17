<?php namespace App\Http\Controllers\Info;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\News;
use App\NewsCategory;


// using route middleware to check admin auth
class NewsController extends Controller {
    // for route: return angular page
  public function home(){
    return view('info.news.home');
  }

  // news detail page
  public function view($id){
    return view('info.news.view')->withNews(News::find($id));//withNews: $news
  }
    // RESTful methods: return json data. 
  public function index()
  {
    return response()->json(News::all());
  }
    // get all news categories
  public function getCategory()
  {
    return response()->json(NewsCategory::all());
  }

    // GET 1 news
  public function show($id){

    return response()->json(News::find($id));
  }
    // GET 1 news category
  public function showCate($id){

    return response()->json(NewsCategory::find($id));
  }


}
