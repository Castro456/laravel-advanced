<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $access_token = '12345';
        // dd(Auth()->user()->name);
        if(!empty($request->access_token)) {
            if($request->access_token !== $access_token) {
                abort(401);
            }
        }
        else {
            abort(401);
        }

        return $next($request);
    }
}
