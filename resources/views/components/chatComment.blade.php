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
@endif