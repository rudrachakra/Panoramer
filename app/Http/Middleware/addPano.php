<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class addPano
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
        DB::insert('insert into panos (name, title) values (?, ?)', [
            $request->pano['name'], 
            $request->pano['title'],
        ]);

        $added_id = DB::select("select id from panos order by id desc limit 1")[0]->id;
    
        foreach($request->view as $view){
          DB::insert('insert into views (description, url, pano_id) values (?, ?, ?)', [
            $view['description'], 
            $view['url'],
            $added_id
          ]);
        }

        $request->added_id =  $added_id;

        return $next($request);
    }
}
