@extends('layout')

@section("title",'ログイン')

@section('header')
@endsection

@section('main')
    <form action = "./login/ok" class = "login_form" method = "POST" autocomplete="off">
        @csrf
        @method('post')
        <h1>Sine-in</h1>
        <p>Login_ID</p>
        <input type = "email" name = "name" maxlength ="20"　required
        placeholder = "UserID">
        <p>Password</p>
        <input type = "password" name = "password" maxlength ="16"　required
        placeholder = "Password">
        <input type = "submit" value = "ログイン">
    </form>
@endsection