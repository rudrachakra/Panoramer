<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getView($id)
    {
        $view = DB::select("select * from views where id=:id", ['id' => $id]);
        return json_encode($view[0]);
    }
}
