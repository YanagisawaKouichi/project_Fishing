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
  // 以下を追記
  public function create(Request $request)
  {
      // admin/fishing/createにリダイレクトする
      return redirect('admin/fishing/create');
  }  
}

