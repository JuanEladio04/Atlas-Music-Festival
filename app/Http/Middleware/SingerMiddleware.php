<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SingerMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->type === 'singer') {
            return $next($request);
        }

        return redirect('/');   
    }
}
