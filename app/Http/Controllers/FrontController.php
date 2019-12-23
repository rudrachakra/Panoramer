<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
  public function load()
  {
    return env('APP_NAME');
  }
}