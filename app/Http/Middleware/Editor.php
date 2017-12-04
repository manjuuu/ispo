<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Editor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if(Auth::user()->admin == 1)
        {
            return $next($request);
        }

        if (Auth::user()->groups()->where('can_edit', 1)->exists()) {
            return $next($request);
        }

        return redirect(route('forms'));

    }
}
