@extends('layouts/layout')

@section("title",$item->name.'さんのページ')

@section('header')
    <header>
        <h1>Home_Page</h1>
    </header>
@endsection

@section('main')
    <table>
        <tr>
            <th>name</th>
            <th>user_id</th>
            <th>password</th>
            <th>crated_at</th>
        </tr>
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->created_at}}</td>
        </tr>
    </table>
@endsection
