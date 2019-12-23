<?php

namespace App\Http\Middleware;

use Closure;

class ErrorAuth
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
        if($request->session()->get('error')){
            $error_message = $request->session()->get('error');
            return view('admin.login', ['error' => $error_message]);
        }
        return $next($request);
    }
}
