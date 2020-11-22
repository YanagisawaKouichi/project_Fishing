<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Fish;

class FishController extends Controller
{
  // Actionの追加
  public function add()
  {
      return view('admin.fish.create');
  }
  // 以下を追記
  public function create(Request $request)
  {
     
     $this->validate($request, Fish::$rules);
      $fish = new Fish;
      $form = $request->all();
      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/image');
        $fish->image_path = basename($path);
      } else {
          $fish->image_path = null;
      }
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $fish->fill($form);
      $fish->save();
      // admin/fish/createにリダイレクトする
      return redirect('admin/fish/create');
  }  
  
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
        // 検索された検索結果を取得する
        $posts = Fish::where('title, $cond_title')->get();
      } else {
        //それ以外は全てのニュースを取得する
        $posts = Fish::all();
      }
      return view('admin.fish.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  
}

