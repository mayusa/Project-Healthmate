<?php namespace App\Http\Middleware;
use Closure;
use Auth;
class AdminMiddleware 
{
	public function handle($request, Closure $next)
	{
		if (Auth::user()->rid != 2 && Auth::user()->rid != 3)
    {
        throw new \Exception("YOU ARE NOT ADMIN");

    } else if(!Auth::check()){

        throw new \Exception("LOGIN PLEASE");
    }
		return $next($request);
	}
}
