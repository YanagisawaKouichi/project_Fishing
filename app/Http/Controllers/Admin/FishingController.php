<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FishingController extends Controller
{
  // Actionの追加
  public function add()
  {
      return view('admin.fishing.create');
  }

}
