@inject('Test', 'App\Http\Controllers\Test')

@extends('layouts/layout_home')

@section("title",'Mypage')

@section('menu')
<div class = "setting_menu">
    <h1>menu</h1>
    <a href = "{{ route('home_get') }}">ホーム</a>
    <a href = "{{ route('gide') }}">このサイトについて</a>
</div>
@endsection

@section('main')
<script src = /laravel/resources/js/make_board.js></script>
<div class = "boards">
    <h1>{{$title}}</h1>
    @if($boards->isEmpty())
        <p>該当するボードがございません。</p>
    @else
        @foreach($boards as $board)
            <?php
                $comment = str_replace("\n","<br>",$board->comment->comment);
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
                    @if(Auth::id() == $userid)
                        <label for = "edit{{$id}}">
                            <i class="fas fa-pen-square blue"></i>
                            <button id = "edit{{$id}}" onclick = "click_edit({{$id}},'{{$name}}','{{$comment}}')"></button>
                        </label>
                        <label for = "delete{{$id}}">
                            <i class="fas fa-minus-square red"></i>
                            <button id = "delete{{$id}}" onclick = "click_delete({{$id}})"></button>
                        </label>
                    @endif
                    <button onclick = "location.href = './board/{{$id}}'" id = "board{{$id}}"></button>
                </label>
            </article>
        @endforeach
        <div class = "button_frame">
            @for($i = 0,$j = 0;$i <= $count;$i++)
                @if($i % 6 == 0)
                    <button type = "button" onclick = "location.href = '{{$Test->get_url($title,$j,$search)}}'">
                        {{++$j}}
                    </button>
                @endif
            @endfor
        </div>
    @endif
</div>
@endsection

@section('fixed')
    <div class='fixed'>
        <div class="editbox">
            <p class ='head'>
                ボードを編集
                <i class='fas fa-times' id = 'remove'></i>
            </p>
            <input type = 'text' name = 'name' required>
            <textarea rows = '8' cols='40' name = 'comment' required wrap='hard'></textarea>
            <input type = 'submit' id = 'submit' value = '編集完了'>
        </div>
    </div>
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
@endsection