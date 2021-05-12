@extends('layouts/layout_home')

@section("title",'404 Not Found')

@section('menu')
<div class = "setting_menu">
    <h1>menu</h1>
    <a href = "{{ route('home_get') }}">ホーム</a>
    <a href = "{{ route('gide') }}">このサイトについて</a>
</div>
@endsection

@section('main')
    <div class = "boards">
        <h1>404 Not Found</h1>
        <p>このページは表示できません。</p>
    </div>
@endsection

@section('script')
@endsection