@extends('layouts/layout')

@section("title",'Mypage')

@section('header')
<header>
    <h1>Home_Page</h1>
    <p><span class="fas fa-user-circle"></span>{{Auth::user()->name}}さん</p>
    <a href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">Logout</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
</header>
@endsection

@section('main')
@endsection