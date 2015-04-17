<?php namespace App\Http\Middleware;
use Closure;
use Auth;

class UserMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
				// check login first
		if (!Auth::check())
    {
        // throw new \Exception("LOGIN PLEASE");
        return redirect('/auth/login')->withErrors([
            'email' => 'LOGIN PLEASE',
        ]);

    }
    else if(Auth::id() != Session::::get('userid'))
    {
        return Redirect::back()->withInput()->withErrors('user id error!');
    }
    else if(Auth::user()->status == 1)
    {
        // throw new \Exception("YOU ARE NOT ADMIN");
        return redirect('/auth/login')->withErrors([
            'email' => 'YOUR ACCOUNT WAS BLOCKED',
        ]);
    }
		return $next($request);
	}

}
