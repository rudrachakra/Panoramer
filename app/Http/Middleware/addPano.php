<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
  
        $pano_dir = env('PANO_STORAGE')."/".$request->pano['name'];

        Storage::makeDirectory($pano_dir);

        $i = 1;  

        foreach($request->view as $view){

          $path = Storage::putFileAs($pano_dir, $view['jpg'], "view{$i}.jpg");

          DB::insert('insert into views (description, url, pano_id) values (?, ?, ?)', [
            $view['description'], 
            env('VIEWS_PATH').$request->pano['name']."/view{$i}.jpg",
            $added_id
          ]);
          
          $i++;
        }

        $request->added_id = $added_id;

        return $next($request);
    }
}
