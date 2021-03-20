@extends('layout')

@section("title",$item->name.'さんのページ')

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
            <td>{{$item->user_id}}</td>
            <td>{{$item->password}}</td>
            <td>{{$item->created_at}}</td>
        </tr>
    </table>
@endsection
