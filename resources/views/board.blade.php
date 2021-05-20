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
<script src = /laravel/resources/js/make_board.js></script>
<div class = "boards">
    <?php
        $decrypt = Crypt::decryptString($boards->comment->comment);
        $comment = str_replace("\n","<br>",$decrypt);
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
            @include('components.iconBoard',['comment'=>$comment,'name'=>$name,'userid'=>$userid,'id'=>$id,])
        </h2>
        <p class = "subcomment">{{$decrypt}}</p>
        @if(Auth::check())
            @if(Auth::id() != $userid)
                <a href = {{route('chat',$id)}} class = "contact">
                    <i class="fas fa-comments"></i>話してみたい！
                </a>
            @else
                <a href = {{route('mychat',$id)}} class = "contact">
                    <i class="fas fa-comments"></i>トーク内容を確認する
                </a>
            @endif
        @else
            <a href = {{route('chat',$id)}} class = "contact">
                <i class="fas fa-comments"></i>話してみたい！
            </a>
        @endif
    </article>
</div>
@endsection

@section('fixed')
    @include('components.hiddenForm')
@endsection