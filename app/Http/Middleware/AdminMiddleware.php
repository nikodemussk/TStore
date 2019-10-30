<?php

namespace App\Http\Middleware;
use Closure;

class AdminMiddleware
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
        // dd(auth()->user());
        if(!auth()->user()){
            return redirect(route('login'));
        }
        else if (auth()->user()->role != 'admin') {
            return $next($request);
        }
        return abort(403);
    }
}
