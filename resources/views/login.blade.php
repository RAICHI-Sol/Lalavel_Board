@extends('layout')

@section("title",'ログイン')

@section('main')
    <form action = "" class = "login_form">
        <p>Login_ID</p>
        <input type = "email">
        <p>Password</p>
        <input type = "password">
        <input type = "submit" value = "ログイン">
    </form>
@endsection