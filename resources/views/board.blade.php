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
<div class = "boards">
    <h1>{{$boards->board_name}}</h1>
    <article class = "comment">
        <p class = "date">
            投稿日：{{$boards->created_at}}
            <span class = "space"></span>
            <a href = {{route('profile_get',$boards->create_userid)}}>
                投稿者：{{$boards->user->name}}
            </a>
        </p>
        <h2>概要説明</h2>
        <?php echo '<p class = "gide">'.nl2br(htmlspecialchars($boards->comment->comment)).'</p>'?>
        @if(Auth::check())
            <a href = {{route('chat',$boards->id)}} class = "contact">
                @if(Auth::id() != $boards->create_userid)
                    <i class="fas fa-comments"></i>話してみたい！
                @else
                    <i class="fas fa-comments"></i>トークを確認する
                @endif
            </a>
        @else
            <a href = {{route('chat',$boards->id)}} class = "contact">
                <i class="fas fa-comments"></i>話してみたい！
            </a>
        @endif
    </article>
</div>
@endsection