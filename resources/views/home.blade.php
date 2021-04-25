@extends('layouts/layout_home')

@section("title",'Mypage')

@section('header')
    <a href = "./make" class = "make_board"><i class="fas fa-edit"></i>投稿する</a>
    <label for = "menu">{{Auth::user()->name}}さん<i class = "fas fa-user-circle"></i></label>
    <input type="checkbox" id = "menu">
    <div class = "menu">
        <a href = "./"><i class="far fa-address-card"></i>プロフィール編集</a>
        <a href = "./"><i class="fas fa-user-cog"></i>設定</a>
        <a href = "./"><i class="far fa-question-circle"></i>ヘルプ</a>
        <a href = "{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        <i class="fas fa-sign-out-alt"></i>ログアウト</a>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
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