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
        <?php $target = 0?>
        @if($chats !=NULL)
            @foreach($chats as $chat)
                @if($chat->from == Auth::id())
                    <p class ="right">
                        <span class = "message mine">
                            {{(Crypt::decryptString($chat->message))}}
                        </span>
                    </p> 
                @else
                    <p><i class = "fas fa-user-circle"></i>
                        <span class = "message">
                            {{(Crypt::decryptString($chat->message))}}
                        </span>
                    </p>
                    <?php $target = $chat->from?>
                @endif
            @endforeach
        @endif
    </article>
    <div class = "form">
        <input type = "hidden" id = "id" value = {{$board->create_userid}}>
        <input type = "hidden" name = "target" id = "target" value = "{{$target}}">
        <textarea placeholder = "メッセージを入力" name = "message" required></textarea>
        <input type="submit" id ="submit" value = "送信">
    </div>
</div>
@endsection
@section('script')
    <script src = '/laravel/resources/js/main.js'></script>    
@endsection