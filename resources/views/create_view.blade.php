@extends('layouts/layout')

@section("title",'新規アカウント作成')

@section('main')
    <form action = "{{route('createCheck')}}" class = "create_form" method = "POST" autocomplete="off">
        @csrf
        @method('post')
        <h1>アカウント作成</h1>
        <p>Name</p>
        <input type = "text" name = "name" placeholder = "Username" value = "{{old('name')}}"
        class = "@error('name') is-invalid @enderror">
        @error('name')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <p>UserID</p>
        <input type = "email" name = "email" placeholder = "UserID" value = "{{old('email')}}"
        class = "@error('email') is-invalid @enderror">
        @error('email')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <p>Password</p>
        <input type = "password" name = "password" placeholder = "Password" value = "{{old('password')}}"
        class = "@error('password') is-invalid @enderror">
        @error('password')
            <p class = 'error'>{{ $message }}</p>
        @enderror
        <input type = "submit" value = "新規作成">
        <a href = './'><span class="fas fa-home"></span>ホームに戻る</a>
    </form>
@endsection