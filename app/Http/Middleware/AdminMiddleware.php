<?php namespace App\Http\Middleware;
use Closure;
use Auth;

class AdminMiddleware 
{
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
    else if(Auth::user()->rid != 2 && Auth::user()->rid != 3)
    {
        // throw new \Exception("YOU ARE NOT ADMIN");
        return redirect('/auth/login')->withErrors([
            'email' => 'YOU ARE NOT ADMIN',
        ]);
    }
		return $next($request);
	}
}
