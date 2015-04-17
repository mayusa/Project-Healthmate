<?php namespace App\Http\Controllers\Info;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// using route middleware to check admin auth
class HotlinesController extends Controller {
    // for route: return angular page
    public function home(){
        return view('info.hotlines.home');
    }
    
}
