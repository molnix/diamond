@include('user.userProfileHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    <h1>Страница: {{$user->name}}</h1>
    <h2>Появились вопросы?</h2>
    <button id="ChatOpenBtn" class="btn btn_open_chat" value="{{route('create_message',['id'=>$chat->id])}}">Задавайте их здесь</button>
    @include('chat.Chat')
    <div id="Orders-list" class="main_list">
        <h1>Список всех заказов:</h1>
        <div class="main_list_content">
                @if($jobs)
                @foreach($jobs as $job)
                    <div class = "main_list_overflow_content-block">
                        <div class = "main_list_overflow_content-block_images">
                            @if($job->image_before != null)
                                <img src="{{asset($job->image_before)}}" alt="Нет фотографии" class="img-fit">
                            @else
                                <img src="{{asset('images/bg.svg')}}" alt="Нет фотографии" class="img-fit">
                            @endif
                        </div>
                        <div class = "main_list_overflow_content-block_info">
                            <p>
                                Заказ выполняет:
                                @if(isset($job->worker->email))
                                    {{$job->worker->email}}
                                @else
                                    Нет данных о мастере:
                                @endif
                            </p>
                            <p>
                                Название:
                                {{$job->name}}
                            </p>
                            <p>
                                Цена:
                                {{$job->price}} руб.
                            </p>
                            <p>
                                Статус:
                                @if(isset($job->status->name))
                                    {{$job->status->name}}
                                @else
                                    Нет статуса
                                @endif
                            </p>
                            <p>
                                Срок до:
                                {{$job->time_end}}
                            </p>
                        </div>
                        <div class = "main_list_overflow_content-block_images">
                            @if($job->image_after != null)
                                <img src="{{asset($job->image_after)}}" alt="Нет фотографии" class="img-fit">
                            @else
                                <img src="{{asset('images/bg.svg')}}" alt="Нет фотографии" class="img-fit">
                            @endif
                        </div>
                    </div>
                @endforeach
                @endif

        </div>
    </div>

</main>
@include('mainPage.indexFooter')
