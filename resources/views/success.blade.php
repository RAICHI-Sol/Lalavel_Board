@extends('layouts/layout_home')

@section("title",$title)

@section('main')
    <div class = "saccess">
        <p>{{$name}}さんのアカウントが{{$text}}されました。</p><br>
        <a href = "{{route('home_get')}}">ホームに戻る</a>
    </div>
@endsection