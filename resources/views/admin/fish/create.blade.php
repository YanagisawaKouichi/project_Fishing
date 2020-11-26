@extends('layouts.admin')
@section('title', '魚種新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>魚種新規登録</h2>
                <form action="{{ action('Admin\FishController@create') }}" method="post" enctype="multipart/form-data">
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
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for= "season">季節</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="season" value="{{ old('season') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for= "size">サイズ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="size" value="{{ old('size') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for= "device">仕掛け</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="device" value="{{ old('device') }}">
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
                        <label class="col-md-2" for= "body">説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="image">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection