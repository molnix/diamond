<div id="Chat" class="chat">
    <div class="chat__wrapper">
        <p id="ChatCloseBtn"></p>
        <div id="ChatMessages" class="chat__messages">

        </div>
        <form id="FormCreateMessage" action="{{route('create_message',['id'=>$chat->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            <input id="Message" type="text" name="message" placeholder="Введите сообщение" style="width:30%;max-width: 500px;">
            <label for="MessageFile">Прикрепить файл</label>
            <input id="MessageFile" type="file" name="file" hidden>
        </form>
        <button id="BtnCreateMessage" form="FormCreateMessage" class="btn">Отправить</button>
        <div class="alert alert-danger">
            <ul id="ChatAllert">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                @endif
            </ul>
        </div>

    </div>
</div>
