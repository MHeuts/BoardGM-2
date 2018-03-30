<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Models\UserRole;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
	{
		$isAdmin = UserRole::where('user_id', '=', Auth::user()->id)->where('role_id', '=', 2)->first();
		
		 if (Auth::user() &&  $isAdmin) {
				return $next($request);
		 }

		return redirect('/');
	}
}
