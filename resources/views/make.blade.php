@extends('layouts/layout_home')

@section("title",'ボードの作成')

@section('main')
<div class = "make_board">
    <h1>ボードを作成</h1>
    <form action="{{ route('make') }}" method="POST" autocomplete="off">
        @csrf
        @method('post')
        <input type = "text" name = "board_name" maxlength = "80" required
        placeholder = "タイトル" class = "@error('name') is-invalid @enderror">
        @error('name')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <textarea rows = "8" cols="40" name = "comment" required wrap="hard"
        class = "@error('text') is-invalid @enderror" placeholder = "概要"></textarea>
        @error('text')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <input type = "submit" value = "投稿">
    </form>
</div>
@endsection