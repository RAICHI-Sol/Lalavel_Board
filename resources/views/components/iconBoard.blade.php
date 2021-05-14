@if(Auth::id() == $userid)
    <label for = "edit{{$id}}">
        <i class="fas fa-pen-square blue"></i>
        <button id = "edit{{$id}}"
        onclick = "click_edit({{$id}},'{{$name}}','{{$comment}}')"></button>
    </label>
    <label for = "delete{{$id}}">
        <i class="fas fa-minus-square red"></i>
        <button id = "delete{{$id}}" onclick = "click_delete({{$id}})"></button>
    </label>
@endif