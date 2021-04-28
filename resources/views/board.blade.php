@extends('layouts/layout_home')

@section("title",$boards->board_name)

@section('main')
<div class = "boards">
    <h1>{{$boards->board_name}}</h1>
    <article class = "comment">
        <p class = "date">
            投稿日：{{$boards->created_at}}
            <span class = "space"></span>
            <a href = {{route('profile_get',$boards->create_userid)}}>投稿者：{{$boards->name}}</a>
        </p>
        <h2>概要説明</h2>
        <?php echo '<p>'.nl2br(htmlspecialchars($boards->comment)).'</p>' ?>
    </article>
</div>
@endsection