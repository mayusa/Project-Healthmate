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
    //涉及到分页，暂时不用此func,使用下面的angular()
    return response()->json(News::all());
  }

  // for angular pagination
   public function angular()
  {
    // laravel pagination
    $news = News::paginate(20);
    return $news;
    // {"total":100,"per_page":10,"current_page":1,"last_page":10,"next_page_url":"http:\/\/socialeat.app\/api\/items\/?page=2","prev_page_url":null,"from":1,"to":10,
    // "data":[ {...}, {...}}]
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
