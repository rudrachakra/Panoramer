<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class updatePano
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

        DB::table('panos')->where('id', $request->pano['id'])->update([
            'name' => $request->pano['name'],
            'title' => $request->pano['title']
        ]);
      
        foreach($request->view as $view){
            DB::table('views')->where('id', $view['id'])->update([
              'description' => $view['description'],
              'url' => $view['url']
            ]);
        }  

        return $next($request);
    }
}
