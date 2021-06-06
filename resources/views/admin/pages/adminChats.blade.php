@include('profile.profileHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    @include('admin.adminNav')
    <h1 class="main_caption">Чаты:</h1>
    <div id="Chats" class="chats">
        <div class="tracked_chats">
            <h3>Отслеживаемые чаты:</h3>
            <div id="TrackedChats" class="chats_list">
                @foreach($chats_tracked as $chat)
                    <div class="chat_actions">
                        <button class="btn btn_open_chat" value="{{route('create_message',['id'=>$chat->id])}}">{{$chat->user->name}}</button>
                        <a class="href-red" href="{{route('chat_tracked',['id'=>$chat->id])}}">Игнорировать</a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="chat_list">
            <h3>Все чаты:</h3>
            <div id="AllChats" class="chats_list">
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
            </div>
        </div>
    </div>
    @include('chat.Chat')
</main>

@include('mainPage.indexFooter')
