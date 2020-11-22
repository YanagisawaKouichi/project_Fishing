<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlaceController extends Controller
{
  // Actionの追加
  public function add()
  {
      return view('admin.place.create');
  }
  // 以下を追記
  public function create(Request $request)
  {
      // admin/fish/createにリダイレクトする
      return redirect('admin/place/create');
  }  
}

