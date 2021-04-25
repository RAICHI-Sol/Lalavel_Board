@extends('layouts/layout_home')

@section("title",'Mypage')

@section('header')
    <a href = "./make" class = "make_board"><i class="fas fa-edit"></i>投稿する</a>
    <label for = "menu">{{Auth::user()->name}}さん<i class = "fas fa-user-circle"></i></label>
    <input type="checkbox" id = "menu">
    <div class = "menu">
        <a href = "./"><i class="far fa-address-card"></i>プロフィール編集</a>
        <a href = "./"><i class="fas fa-user-cog"></i>設定</a>
        <a href = "./"><i class="far fa-question-circle"></i>ヘルプ</a>
        <a href = "{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>ログアウト</a>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
@endsection

@section('main')
<div class = "make_board">
    <h1>ボードを作成</h1>
    <form action="{{ route('make') }}" method="POST" autocomplete="off">
        @csrf
        @method('post')
        <p>■タイトル</p><input type = "text" name = "board_name" maxlength = "80" required
        placeholder = "例：【急募】～してくれる方を募集" class = "@error('name') is-invalid @enderror">
        @error('name')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <p>■本文</p>
        <textarea rows = "8" cols="40" name = "comment" required
        class = "@error('email') is-invalid @enderror" placeholder = "募集概要、期間、条件などを記載"></textarea>
        @error('text')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <input type = "submit" value = "投稿">
    </form>
</div>
@endsection