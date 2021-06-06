@foreach($chats as $chat)
<div class="chat_actions">
    <button class="btn btn_open_chat" value="{{route('create_message',['id'=>$chat->id])}}">{{$chat->user->name}}</button>
    @if($chat->tracked == 0)
    <a class="href-blue" href="{{route('chat_tracked',['id'=>$chat->id])}}">Отслеживать</a>
    @else
    <a class="href-red" href="{{route('chat_tracked',['id'=>$chat->id])}}">Игнорировать</a>
    @endif
</div>
@endforeach
