@inject('Crypt', 'Illuminate\Support\Facades\Crypt')
@extends('layouts/layout_home')

@section("title",'チャット')

@section('menu')
    @include('components.menu')
@endsection

@section('main')
<div id = "app" class = "boards">
    <article class = "chat_comment">
        <h2>{{$board->board_name}}</h2>
        <article class = "chats">
            @if($chats !=NULL)
                @foreach($chats as $chat)
                    @include('components.chatComment',['chat'=>$chat])
                @endforeach
            @endif
        </article>
    </article>
    <div class = "chat_box">
        <input type = "hidden" id = "id" value = {{$board->id}}>
        <input type = "hidden" name = "target" id = "target" value = "{{$board->create_userid}}">
        <textarea placeholder = "メッセージを入力" name = "message" required wrap='hard'></textarea>
        <input type="submit" id ="submit" value = "送信">
    </div>
</div>
@endsection
@section('script')
    @include('components.chatScript',['url'=>'../chat/'.$board->id])
@endsection