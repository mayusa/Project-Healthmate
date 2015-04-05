<?php namespace App\Http\Controllers\Cms;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect, Input, Auth;
use App\User;

// using route middleware to check admin auth
class CmsHomeController extends Controller {
    // for route: return angular page
    public function index(){
        return view('cms.home');
    }
}
