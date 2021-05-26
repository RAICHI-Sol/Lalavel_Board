@extends('layouts/layout_home')

@section("title",'404 Not Found')

@section('menu')
    @include('components.menu')
@endsection

@section('main')
    <div class = "boards">
        <h1>404 Not Found</h1>
        <p>このページは表示できません。</p>
    </div>
@endsection

@section('script')
@endsection