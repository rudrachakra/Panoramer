<?php

namespace App\Http\Middleware;

use Closure;

class IsValidUser
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
        $validUser = [
            'login' => env('ADMIN_LOGIN'), 
            'pass' => env('ADMIN_PASS')
        ];
    
        if($request->user == $validUser){
            $request->session()->put('isAdmin', true);
            return redirect('admin');
        }else{
            $request->session()->flash('error', true);
            return redirect('admin/login');
        }

        return $next($request);
    }
}
