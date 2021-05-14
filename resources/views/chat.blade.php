@inject('Crypt', 'Illuminate\Support\Facades\Crypt')
@extends('layouts/layout_home')

@section("title",'チャット')

@section('menu')
<div class = "setting_menu">
    <h1>menu</h1>
    <a href = "{{ route('home_get') }}">ホーム</a>
    <a href = "{{ route('gide') }}">このサイトについて</a>
</div>
@endsection

@section('main')
<div class = "boards">
    <h1>Chat</h1>
    <article class = "comment">
        <h2>{{$board->board_name}}</h2>
        @if($chats !=NULL)
            @foreach($chats as $chat)
                @include('components.chatComment',['chat'=>$chat])
            @endforeach
        @endif
    </article>
    <div class = "chat_box">
        <input type = "hidden" id = "id" value = {{$board->id}}>
        <input type = "hidden" name = "target" id = "target" value = "{{$board->create_userid}}">
        <textarea placeholder = "メッセージを入力" name = "message" required></textarea>
        <input type="submit" id ="submit" value = "送信">
    </div>
</div>
@endsection
@section('script')
    <script src = "{{ secure_asset('js/main.js')}}"></script>
@endsection