<?php

namespace App\Http\Middleware;

use Closure;

class signError
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
        $params = [];

        if($request->session()->get('error')){
            $params['error'] = $request->session()->get('error');
        }
        
        $request->params = $params;

        return $next($request);
    }
}
