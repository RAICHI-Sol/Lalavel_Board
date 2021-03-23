@extends('layouts/layout')

@section("title",'新規アカウント作成')

@section('header')
@endsection

@section('main')
    <form action = "create/add" class = "create_form" method = "POST" autocomplete="off">
        @csrf
        @method('post')
            <h1>Register</h1>
            <p>Name</p>
            <input type = "text" name = "name" maxlength ="20"　required
            placeholder = "Username" class = "@error('name') is-invalid @enderror">
            @error('name')
                <p class = 'error'>{{ $message }}</p>
            @enderror
            <p>UserID</p>
            <input type = "email" name = "email" maxlength ="30" required
            placeholder = "UserID" class = "@error('email') is-invalid @enderror">
            @error('email')
                <p class = 'error'>{{ $message }}</p>
            @enderror
            <p>Password</p>
            <input type = "password" name = "password" maxlength ="16"　required
            placeholder = "Password" class = "@error('password') is-invalid @enderror">
            @error('password')
                <p class = 'error'>{{ $message }}</p>
            @enderror
            <input type = "submit" value = "新規作成">
            <a href = './'><span class="fas fa-home"></span>ホームに戻る</a>
    </form>
@endsection