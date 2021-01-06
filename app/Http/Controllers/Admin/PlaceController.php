<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Place;
use App\Placehistories;
use Carbon\Carbon;
use Storage;

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
     
      $this->validate($request, Place::$rules);
      $place = new Place;
      $form = $request->all();
      // フォームから画像が送信されてきたら、保存して、$news->image_path に画像のパスを保存する
      if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $place->image_path = Storage::disk('s3')->url($path);
      } else {
          $place->image_path = null;
      }
      // フォームから送信されてきた_tokenを削除する
      unset($form['_token']);
      // フォームから送信されてきたimageを削除する
      unset($form['image']);
      // データベースに保存する
      $place->fill($form);
      $place->save();
      
      $posts = Fish::all();
      // admin/place/createにリダイレクトする
      
      return redirect('admin/place/create');
  }  
  
  public function index(Request $request)
  {
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
        // 検索された検索結果を取得する
        $posts = Place::where('title, $cond_title')->get();
      } else {
        //それ以外は全てのニュースを取得する
        $posts = Place::all();
      }
      return view('admin.place.index', ['posts' => $posts, 'cond_title' => $cond_title]);
  }
  
  public function edit(Request $request)
  {
      // Place Modelからデータを取得する
      $place = Place::find($request->id);
      if (empty($place)) {
        abort(404);    
      }
      return view('admin.place.edit', ['place_form' => $place]);
  }


  public function update(Request $request)
  {
      // Validationをかける
      $this->validate($request, Place::$rules);
      // News Modelからデータを取得する
      $place = Place::find($request->id);
      // 送信されてきたフォームデータを格納する
      $place_form = $request->all();
      if ($request->remove == 'true') {
          $place_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $place_form->image_path = Storage::disk('s3')->url($path);
      } else {
          $place_form['image_path'] = $place->image_path;
      }

      unset($place_form['image']);
      unset($place_form['remove']);
      unset($place_form['_token']);

      // 該当するデータを上書きして保存する
      $place->fill($place_form)->save();
      
      $history = new Placehistories;
        $history->place_id = $place->id;
        $history->placeedited_at = Carbon::now();
        $history->save();

      return redirect('admin/place');
  }
  public function delete(Request $request)
  {
      // 該当するNews Modelを取得
      $place = Place::find($request->id);
      // 削除する
      $place->delete();
      return redirect('admin/place/');
  }
}

