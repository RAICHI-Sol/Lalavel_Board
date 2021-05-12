@extends('layouts/layout_home')

@section("title",$boards->board_name)

@section('menu')
<div class = "setting_menu">
    <h1>menu</h1>
    <a href = "{{ route('home_get') }}">ホーム</a>
    <a href = "{{ route('gide') }}">このサイトについて</a>
</div>
@endsection

@section('main')
<script src = "{{ secure_asset('js/make_board.js')}}"></script>
<div class = "boards">
    <?php
        $comment = str_replace("\n","<br>",$boards->comment->comment);
        $name    = $boards->board_name;
        $id      = $boards->id;
        $userid  = $boards->create_userid;
    ?>
    <h1>{{$name}}</h1>
    <article class = "comment">
        <p class = "date">
            投稿日：{{$boards->created_at}}
            <span class = "space"></span>
            <a href = {{route('profile_get',$userid)}}>
                投稿者：{{$boards->user->name}}
            </a>
        </p>
        <h2>
            概要説明
            @if(Auth::id() == $userid)
                <label for = "edit{{$id}}">
                    <i class="fas fa-pen-square blue"></i>
                    <button id = "edit{{$id}}"
                    onclick = "click_edit({{$id}},'{{$name}}','{{$comment}}')"></button>
                </label>
                <label for = "delete{{$id}}">
                    <i class="fas fa-minus-square red"></i>
                    <button id = "delete{{$id}}" onclick = "click_delete({{$id}})"></button>
                </label>
            @endif
        </h2>
        <p class = "subcomment">{{$boards->comment->comment}}</p>
        @if(Auth::check())
            <a href = {{route('chat',$id)}} class = "contact">
                @if(Auth::id() != $userid)
                    <i class="fas fa-comments"></i>話してみたい！
                @else
                    <i class="fas fa-comments"></i>トークを確認する
                @endif
            </a>
        @else
            <a href = {{route('chat',$id)}} class = "contact">
                <i class="fas fa-comments"></i>話してみたい！
            </a>
        @endif
    </article>
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