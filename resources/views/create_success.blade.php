@extends('layouts/layout_home')

@section("title",'新規アカウント作成')

@section('main')
    <div class = "saccess">
        <p>{{$name}}さんのアカウントが作成されました。</p><br>
        <a href = "../">ホームに戻る</a>
    </div>
@endsection