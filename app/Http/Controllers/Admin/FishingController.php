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

  public function create()
  {
      return redirect('admin/fishing/create');
  }

  public function edit()
  {
      return view('admin.fishing.edit');
  }

  public function update()
  {
      return redirect('admin/fishing/edit');
  }

}
