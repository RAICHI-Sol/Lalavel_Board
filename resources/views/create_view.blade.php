@extends('layout')

@section("title",'新規アカウント作成')

@section('main')
    <form action = "create/add" class = "create_form" method = "POST">
        @csrf
        @method('post')
            <p>Name</p>
            <input type = "text" name = "name">
            <p>User_ID</p>
            <input type = "email" name = "user_id">
            <p>Password</p>
            <input type = "password" name = "password">
            <input type = "submit" value = "新規作成">
    </form>
@endsection