@extends('layouts/layout')

@section("title",'Home')

@section('header')
<header>
    <h1><a href = "./">Home Page</a></h1>
    <form method = "POST" class = "seach_form">
        @csrf
        <input type = "search" name = "search" maxlength ="30" placeholder = "検索">
        <button type = "button"><span class = "fas fa-search"></button>
    </form>
    <a href = "./login" class = "button">Sine in</a>
    <a href = "./create" class = "button">New</a>
</header>
@endsection

@section('main')
@endsection