@foreach($messages as $message)
    @if(auth()->user()['id'] == $message->user_id)
        <div class="message-left">
            <p>{{$message->user->name}}:</p>
            <p>{{$message->message}}</p>
            @if($message->image)
                <div class="message_image">
                    <img src="{{asset($message->image)}}" alt="">
                </div>
            @endif
        </div>
    @else
        <div class="message-right">
            <p>{{$message->user->name}}:</p>
            <p>{{$message->message}}</p>
            @if($message->image)
                <div class="message_image">
                    <img src="{{asset($message->image)}}" alt="" >
                </div>
            @endif
        </div>
    @endif
@endforeach
