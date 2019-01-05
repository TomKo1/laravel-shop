<?php

namespace App\Http\Middleware;

use Closure;

class CheckProfileAuth
{
    /**
     * check if user is logged, is admin or current user has
     * the same id as logged user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check()) {
            if(auth()->user()->isAdmin() || $request->route()->id == auth()->user()->id) {
                return $next($request);
            }
        }

        return redirect('/');
    }
}
