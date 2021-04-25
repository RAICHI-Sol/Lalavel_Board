@extends('layouts/layout_home')

@section("title",'Home')

@section('header')
    <label for = "menu">ゲストさん<i class = "fas fa-user-circle"></i></label>
    <input type="checkbox" id = "menu">
    <div class = "menu">
        <a href = "./login"><i class="fas fa-sign-in-alt"></i>ログイン</a>
        <a href = "./create"><i class="fas fa-user-plus"></i>アカウント作成</a>
    </div>
@endsection

@section('main')
<div class = "boards">
    <h1>{{$title}}</h1>
    @if($boards->isEmpty())
        <p>該当するボードがございません。</p>
    @else
        @foreach($boards as $board)
            <div class = "board">
                <p class = "date">
                    投稿日：{{$board->created_at}}
                    <span class = "space"></span>閲覧数：{{$board->watcher}}
                    <span class = "space"></span>投稿者：{{$board->name}}
                </p>
                <p>{{$board->board_name}}</p>
            </div>
        @endforeach
        <div class = "button_frame">
            @for($i = 0,$j = 0;$i <= $count;$i++)
                @if($i % 6 == 0)
                    @if($title =='Home')
                        <?php $url = './?page='.$j ?>
                    @else
                        <?php $url = './result/?page='.$j.'&search='.$search ?>
                    @endif
                    <button type = "button" onclick = "location.href = '{{$url}}'">{{++$j}}</button>
                @endif
            @endfor
        </div>
    @endif
</div>
@endsection