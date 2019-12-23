<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
  public function login(Request $request)
  {
    return view('admin.login', $request->params);
  }

  public function checkAuth(Request $request){}

  public function admin(Request $request)
  {
    return view('admin.admin', ['panos' => $request->panos]);
  }

  public function addPanoForm()
  {
    return view('admin.add');
  }

  public function addPanoAction(Request $request)
  {
    return redirect("admin/edit/{$request->added_id}");
  }

  public function editPano($id)
  {
    $pano = DB::select("select * from panos where id=:id", ['id' => $id]);
    $views = DB::select("select * from views where pano_id=:pano_id", ['pano_id' => $id]);
    return view('admin.edit', ['pano' => $pano[0], 'views' => $views]);
  }

  public function editPanoAction(Request $request)
  {
    return redirect("admin/edit/{$request->pano['id']}");
  }

  public function deletePano($id)
  {
    DB::delete("delete from panos where id=:id", ['id' => $id]);
    DB::delete("delete from views where pano_id=:id", ['id' => $id]);
    return redirect('admin');
  }

  public function setPoints($id)
  {
    $view = DB::select("select * from views where id=:id", ['id' => $id]);
    return view('admin.points', ['view' => $view[0]]);
  }
}