@extends('layouts/layout')

@section("title",'Mypage')

@section('header')
<header>
    <h1><a href = "./">Home Page</a></h1>

    <form method = "POST" class = "seach_form">
        @csrf
        <input type = "search" name = "search" maxlength ="30" placeholder = "検索">
        <button type = "button"><span class = "fas fa-search"></button>
    </form>

    <p><span class = "fas fa-user-circle"></span>{{Auth::user()->name}}さん</p>
    <a href = "{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();" class = "button">Logout</a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</header>
@endsection

@section('main')
@endsection