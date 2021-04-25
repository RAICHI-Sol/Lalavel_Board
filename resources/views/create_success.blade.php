@extends('layouts/layout_home')

@section("title",'新規アカウント作成')

@section('header')
    <label for = "menu">ゲストさん<i class = "fas fa-user-circle"></i></label>
    <input type="checkbox" id = "menu">
    <div class = "menu">
        <a href = "./login"><i class="fas fa-sign-in-alt"></i>ログイン</a>
        <a href = "./create"><i class="fas fa-user-plus"></i>アカウント作成</a>
    </div>
@endsection


@section('main')
    <div class = "saccess">
        <p>{{$name}}さんのアカウントが作成されました。</p><br>
        <a href = "../">ホームに戻る</a>
    </div>
@endsection