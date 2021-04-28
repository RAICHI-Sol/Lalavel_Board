@inject('Test', 'App\Http\Controllers\Test')

@extends('layouts/layout_setting')

@section("title",'設定')

@section('main')
<div class = "setting">
    <h1>アカウント設定</h1>
    <p>アカウントの削除を行います。</p>
    <p class = "red">※一度削除したアカウントは元には戻りません。</p>
    <form action="{{ route('destroy') }}" method="POST" autocomplete="off">
        @csrf
        @method('delete')
        <input type = "submit" value = "削除する">
    </form>
</div>
@endsection