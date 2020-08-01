<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserAccessible
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
        $user = Auth::user();

        if(!$user->accesible){
            // redirect page or error.
        }
        return $next($request);
    }
}
