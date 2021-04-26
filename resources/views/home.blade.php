@extends('layouts/layout_home')

@section("title",'Mypage')

@section('main')
<div class = "boards">
    <h1>{{$title}}</h1>
    @if($boards->isEmpty())
        <p>該当するボードがございません。</p>
    @else
        @foreach($boards as $board)
            <article class = "board">
                <label for = "board{{$board->id}}">
                    <p class = "date">
                        投稿日：{{$board->created_at}}
                        <span class = "space"></span>投稿者：{{$board->name}}
                    </p>
                    <p>{{$board->board_name}}</p>
                    <button onclick = "location.href = './board/{{$board->id}}'" id = "board{{$board->id}}"></button>
                </label>
            </article>
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