<?php namespace App\Http\Controllers\My;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\MyCondition;

class MyController extends Controller 
{
  // for route: return angular page
  public function home()
  {
    return view('myhealth.home');
  }

}
