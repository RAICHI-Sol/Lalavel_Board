@extends('layouts/layout_home')

@section("title",'Mypage')

@section('main')
<div class = "boards">
    <h1>{{$boards->board_name}}</h1>
    <article class = "comment">
        <p class = "date">
            投稿日：{{$boards->created_at}}
            <span class = "space"></span>投稿者：{{$boards->name}}
        </p>
        <?php echo nl2br(htmlspecialchars($boards->comment)) ?>
    </article>
</div>
@endsection