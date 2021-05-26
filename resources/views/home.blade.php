@inject('Test', 'App\Http\Controllers\Test')

@extends('layouts/layout_home')

@section("title",'Mypage')

@section('menu')
    @include('components.menu')
@endsection

@section('main')
<script src = /laravel/resources/js/make_board.js></script>
<div class = "boards" id = "app">
    <h1>{{$title}}</h1>
    @if($boards->isEmpty())
        <p>該当するボードがございません。</p>
    @else
        @foreach($boards as $board)
            <?php
                $decrypt = Crypt::decryptString($board->comment->comment);
                $comment = str_replace("\n","<br>",$decrypt);
                $name    = $board->board_name;
                $id      = $board->id;
                $userid  = $board->create_userid;
            ?>
            <article class = "board">
                <label for = "board{{$id}}">
                    <p class = "date">
                        投稿日：{{$board->created_at}}
                        <span class = "space"></span>
                        <a href = {{route('profile_get',$userid)}}>
                            投稿者：{{$board->user->name}}
                        </a>
                    </p>
                    <p>{{$board->board_name}}</p>
                    @include('components.iconBoard',['comment'=>$comment,'name'=>$name,'userid'=>$userid,'id'=>$id,])
                    <button onclick = "location.href = './board/{{$id}}'" id = "board{{$id}}"></button>
                </label>
            </article>
        @endforeach
        <div class = "button_frame">
            @for($i = 0,$j = 0;$i <= $count;$i++)
                @if($i % 6 == 0)
                    <button type = "button"
                    onclick = "location.href = '{{$Test->get_url($title,$j,$search)}}'">{{++$j}}</button>
                @endif
            @endfor
        </div>
    @endif
</div>
@endsection

@section('fixed')
    @include('components.hiddenForm')
@endsection


@section('script')
    @if(Request::is('make'))
        <p class='success_comment'>ボードが投稿されました</p>
        <script>
            setTimeout(function(){
                $(".success_comment").remove();
            }, 3000);
        </script>
    @endif
    <script src="/laravel/public/js/app.js"></script>
    <script src="/laravel/resources/js/bloadcast.js"></script>
@endsection