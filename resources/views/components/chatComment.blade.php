<label for = "message">
    @if($chat->from == Auth::id())
        <span class = "message mine">{{(Crypt::decryptString($chat->message))}}</span>
    @else
        <i class = "fas fa-user-circle"></i>
        <span class = "message">{{(Crypt::decryptString($chat->message))}}</span>
    @endif
</label>