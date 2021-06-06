@foreach($chats_tracked as $chat)
    <div class="chat_actions">
        <button class="btn btn_open_chat" value="{{route('create_message',['id'=>$chat->id])}}">{{$chat->user->name}}</button>
        <a class="href-red" href="{{route('chat_tracked',['id'=>$chat->id])}}">Игнорировать</a>
    </div>
@endforeach
