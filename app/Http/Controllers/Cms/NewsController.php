<?php namespace App\Http\Controllers\Cms;

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
    return view('cms.news.home');
  }

  // news detail page
  public function view($id){
    return view('cms.news.view')->withNews(News::find($id));//withNews: $news
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

  public function create(){
    return view('cms.news.create');
  }
    // store news to db
  public function store()
  {
     if (News::create(Input::all())) {
      // return Redirect::back()->with('msg', 'Success');
      return Redirect::to('/cms/news/home')->with('msg', 'Success');
     } else {
      return Redirect::back()->withInput()->withErrors('error!');
     }
  }

    // GET 1 news
  public function show($id){

    return response()->json(News::find($id));
  }
    // GET 1 news
  public function showCate($id){

    return response()->json(NewsCategory::find($id));
  }

    // goto edit page
  public function edit($id)
  {
    return view('cms.news.edit')->withNews(News::find($id));
  }
    // PUT
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
