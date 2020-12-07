@extends('layouts.admin')
@section('title', '場所の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>場所の編集</h2>
                <form action="{{ action('Admin\PlaceController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for= "name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $place_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="shop">釣具屋</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shop" value="{{ $place_form->shop }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="toilet">トイレ</label>
                        <select name="toilet">
                        <option value="あり">あり</option>
                        <option value="なし">なし</option>
                        </select>
                    </div>
                     <div class="form-group row">
                        <label class="col-md-2" for="parking">駐車場</label>
                        <select name="parking">
                            @if ($place_rorm->parking === 'あり') 
                               <option value="あり" selected="selected">あり</option>
                               <option value="なし">なし</option>
                            @else if ($place_form->parking === 'なし') 
                               <option value="なし" selected="selected">なし</option>
                               <option value="あり">あり</option>
                            @else
                               <option value="あり">あり</option>
                               <option value="なし">なし</option>
                            @endif 
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="distance">釣り場までの距離</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="distance" value="{{ $place_form->distance }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $place_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $place_form->image_path }}
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="hidden" name="id" value="{{ $place_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($place_form->placehistories != NULL)
                                @foreach ($place_form->placehistories as $history)
                                    <li class="list-group-item">{{ $history->placeedited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection