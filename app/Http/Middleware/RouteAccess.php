<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
class RouteAccess
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
        if(Request::is('*/super/*') == Request::url())
        {
            if (auth()->user()->role_id !=1)
            {
                return redirect()->route('getHome');
            }
        }
        elseif (Request::is('*/steps/*') == Request::url())
        {
            if (auth()->user()->role_id ==1)
            {
                return redirect()->route('getBackendHome');
            }
        }
        return $next($request);
    }
}