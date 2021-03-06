<?php namespace App\Http\Controllers\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\News;
use App\NewsCategory;

// using route middleware to check admin auth
class NewsController extends Controller 
{
  // for route: return angular page
  public function home()
  {
    return view('cms.news.home');
  }

  // news detail page
  public function view($id)
  {
    return view('cms.news.view')->withNews(News::find($id));//withNews: $news
  }
  // RESTful GET : return json data. 
  public function index()
  {
    return response()->json(News::all());
  }

  // for angular pagination
   public function angular()
  {
    // laravel pagination
    $items = News::paginate(20);
    return $items;
    //return json data: {"total":100,"per_page":10,"current_page":1,"last_page":10,"next_page_url":"http:\/\/socialeat.app\/api\/items\/?page=2","prev_page_url":null,"from":1,"to":10, "data":[ {...}, {...}}]
  }
  
  // get all news categories
  public function getCategory()
  {
    return response()->json(NewsCategory::all());
  }

  public function create()
  {
    return view('cms.news.create');
  }
  // RESTful: POST - store news to db
  public function store()
  {
    $news = new News;
    $news->userid = Input::get('userid');
    $news->title = Input::get('title');
    $news->content = Input::get('content'); // 入库用msqyl_real_escape_string 前面解析用htmlspecialchars
    $news->cateid = Input::get('cateid');
    $news->fromurl = Input::get('fromurl');

    // News::create(Input::all())
    if ( $news->save() ) {
      // return Redirect::back()->with('msg', 'Success');
      return Redirect::to('/cms/news/home')->with('msg', 'Success');
     } else {
      return Redirect::back()->withInput()->withErrors('error!');
     }
  }

  public function show($id)// GET 1 news
  {
    return response()->json(News::find($id));
  }
    
  public function showCate($id)// GET 1 news category
  {
    return response()->json(NewsCategory::find($id));
  }

  public function edit($id)// goto edit page
  {
    return view('cms.news.edit')->withNews(News::find($id));
  }

  // RESTful: PUT
  public function update($id){
    $news = News::find($id);
    $news->title = Input::get('title');
    $news->content = Input::get('content');
    $news->cateid = Input::get('cateid');
    $news->fromurl = Input::get('fromurl');

    // change status field
    $news->status = Input::get('status');

    if ($news->save()) {
      return "success";
    } else {
      return "error";
    }
  }
}