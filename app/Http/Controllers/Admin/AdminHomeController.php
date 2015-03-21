<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\User;
use Auth;

class AdminHomeController extends Controller {

    /**
     * @return $this
     */
    public function index()
    {

        // checking user status
        $status = Auth::user()->status;

        if($status == 1) {

            Auth::logout();
            return view('auth.login')->withErrors([
                'email' => 'Your account are blocked by administrator!',
            ]);

        } else {

            $rid = Auth::user()->rid;

            if($rid >= 2) {
                return view('AdminHome')->withPages(User::all());

            } else {
                Auth::logout();
                return view('auth.login')->withErrors([
                    'email' => 'You are not admin',
                ]);

            }
        }

    }


}
