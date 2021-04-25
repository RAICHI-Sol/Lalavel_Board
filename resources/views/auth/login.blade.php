@extends('layouts/layout')

@section("title",'ログイン')

@section('header')
@endsection

@section('main')
    <form action = {{route('login')}} class = "login_form" method = "POST" autocomplete="off">
        @csrf
        @method('post')
        <h1>ログイン</h1>
        <p>UserID</p>
        <input type = "email" name = "email" maxlength ="30"　required
        placeholder = "UserID" class = "@error('email') is-invalid @enderror">
        @error('email')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <p>Password</p>
        <input type = "password" name = "password" maxlength ="30"　required
        placeholder = "Password" class = "@error('password') is-invalid @enderror">
        @error('password')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <input type = "submit" value = "ログイン">
        <a href = './create'>アカウント作成</a>
    </form>
@endsection