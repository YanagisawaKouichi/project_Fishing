@extends('layouts.admin')
@section('title', '場所新規登録')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>場所新規登録</h2>
                <form action="{{ action('Admin\PlaceController@create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2">名前</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">釣具屋</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="shop" value="{{ old('shop') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">トイレ</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="toilet" value="{{ old('toilet') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">駐車場</label>
                        <form method="post" action="example.cgi">
                        <p>
                        <select name="parking">
                        <option value="あり">あり</option>
                        <option value="なし">なし</option>
                        </select>
                        </p>
                        </form>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">釣り場までの距離</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="distance" value="{{ old('distance') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">説明</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('body') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
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
