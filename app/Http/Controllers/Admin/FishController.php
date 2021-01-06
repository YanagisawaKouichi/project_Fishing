<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Fish;

use App\History;
use Carbon\Carbon;
use Storage;

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
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $fish->image_path = Storage::disk('s3')->url($path);
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
  
  public function edit(Request $request)
  {
      // Fish Modelからデータを取得する
      $fish = Fish::find($request->id);
      if (empty($fish)) {
        abort(404);
      }
      return view('admin.fish.edit', ['fish_form' => $fish]);
  }
  
  
   public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Fish::$rules);
      // Fish Modelからデータを取得する
      $fish = Fish::find($request->id);
      // 送信されてきたフォームデータを格納する
      $fish_form = $request->all();
      if ($request->remove == 'true') {
          $fish_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $fish_form->image_path = Storage::disk('s3')->url($path);
      } else {
          $fish_form['image_path'] = $fish->image_path;
      }

      unset($fish_form['image']);
      unset($fish_form['remove']);
      unset($fish_form['_token']);

      // 該当するデータを上書きして保存する
      $fish->fill($fish_form)->save();
      
      $history = new History;
      $history->fish_id = $fish->id;
      $history->edited_at = Carbon::now();
      $history->save();

      return redirect('admin/fish/');
  }
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $fish = Fish::find($request->id);
      // 削除する
      $fish->delete();
      return redirect('admin/fish/');
  }  
}

