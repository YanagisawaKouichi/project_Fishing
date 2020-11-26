@extends('layouts.admin')
@section('title', '魚の編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>魚の編集</h2>
                <form action="{{ action('Admin\FishController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ $fish_form->name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="season">季節</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="season" value="{{ $fish_form->season }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="size">大きさ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="size" value="{{ $fish_form->size }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="device">仕掛け</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="device" value="{{ $fish_form->device }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for= "level">難易度</label>
                        <select name="level">
                        <option value="簡単">簡単</option>
                        <option value="普通">普通</option>
                        <option value="少し難しい">少し難しい</option>
                        <option value="難しい">難しい</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">本文</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ $fish_form->body }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                            <div class="form-text text-info">
                                設定中: {{ $fish_form->image_path }}
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
                            <input type="hidden" name="id" value="{{ $fish_form->id }}">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="更新">
                        </div>
                    </div>
                </form>
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
                            @if ($fish_form->histories != NULL)
                                @foreach ($fish_form->histories as $history)
                                    <li class="list-group-item">{{ $history->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection