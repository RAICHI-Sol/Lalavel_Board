@inject('Crypt', 'Illuminate\Support\Facades\Crypt')
@extends('layouts/layout_home')

@section("title",'チャット')

@section('menu')
<div class = "setting_menu">
    <h1>Talk</h1>
    @foreach($entrys as $entry)
        <a href = {{route('mychat',['id'=>$entry->boardid,'target'=>$entry->userid])}}>
            {{$entry->user->name}}
        </a>
    @endforeach
</div>
@endsection

@section('main')
<div class = "boards" id = "app">
    <h1>Chat</h1>
    <article class = "comment">
        @if($other !=NULL)
            <h2>{{$other->user->name}}</h2>
        @else
            <h2>メッセージはありません</h2>
        @endif
        @if($chats !=NULL)
            @foreach($chats as $chat)
                @include('components.chatComment',['chat'=>$chat])
            @endforeach
        @endif
    </article>
    @if($other !=NULL)
        <div class = "chat_box">
            <input type = "hidden" id = "id" value = {{$other->boardid}}>
            <input type = "hidden" name = "target" id = "target" value = "{{$other->userid}}">
            <textarea placeholder = "メッセージを入力" name = "message" required wrap='hard'></textarea>
            <input type="submit" id = "mysubmit" value = "送信">
        </div>
    @endif
</div>
@endsection
@section('script')
    @if($other !=NULL)
        @include('components.chatScript',['url'=>'../mypage/'.$other->boardid])
    @endif
@endsection