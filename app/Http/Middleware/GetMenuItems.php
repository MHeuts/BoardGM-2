<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\MenuItem;

class GetMenuItems
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
        $items = MenuItem::tree();

		view()->share('items', $items);

		return $next($request);
    }
}
