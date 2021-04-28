@inject('Test', 'App\Http\Controllers\Test')

@extends('layouts/layout_home')

@section("title",'設定')

@section('menu')
<div class = "setting_menu">
    <h1>menu</h1>
    <a href = "{{ route('set_prof') }}">プロフィール編集</a>
    <a href = "{{ route('set_account') }}">アカウント設定</a>
</div>
@endsection

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