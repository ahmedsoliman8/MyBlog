<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MustBeAdministrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }
        //dd(auth()->user()->username);
        if (auth()->user()->can('admin')){
            abort(Response::HTTP_FORBIDDEN);

        }
        return $next($request);
    }
}
