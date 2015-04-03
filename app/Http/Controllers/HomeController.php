<?php namespace App\Http\Controllers;
use App\Page;

use App\User;
use Auth;

class HomeController extends Controller {

    public function index()
    {
        if(Auth::user()!=null){
            $status = Auth::user()->status;
            if($status == 1){
                Auth::logout();
                return view('auth.login')->withErrors([
                    'email' => 'Your account are blocked by admin',
                ]);
            }
        }
        
        return view('home');

    }

}