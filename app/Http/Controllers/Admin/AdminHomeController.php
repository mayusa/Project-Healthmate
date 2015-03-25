<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Auth;

// using route middleware to check admin auth
class AdminHomeController extends Controller 
{
  public function index()
  {
    // checking user status
    $status = Auth::user()->status;

    if($status == 1) 
    {
        Auth::logout();
        return view('auth.login')->withErrors([
            'email' => 'Your account are blocked by administrator!',
        ]);

    } 
    else 
    {
        return view('admin.home');
    }

  }

}
