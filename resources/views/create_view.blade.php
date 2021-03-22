@extends('layout')

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
            placeholder = "Username">
            <p>User_ID</p>
            <input type = "email" name = "user_id" maxlength ="30" required
            placeholder = "UserID">
            <p>Password</p>
            <input type = "password" name = "password" maxlength ="16"　required
            placeholder = "Password">
            <input type = "submit" value = "新規作成">
    </form>
@endsection