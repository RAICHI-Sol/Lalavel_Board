@extends('layout')

@section("title",'新規アカウント作成')

@section('header')
    <header><h1>Home_Page<h1></header>
@endsection


@section('main')
    <h1 class = "saccess">{{$name}}さんのアカウントが作成されました。</h1><br>
    <a href = "..">ホームに戻る</a>
@endsection