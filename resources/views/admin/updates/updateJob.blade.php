@include('profile.profileHead')
@include('mainPage.indexHeader')
<main id="Main" class="main">
    @include('admin.adminNav')
<form method="post" enctype="multipart/form-data" class="main_form">
    @csrf
    <h2>Работник:</h2>
    <select name="worker">
        @if($workers)
            @foreach($workers as $worker)
                @if($worker->id === $jobUpdate->worker_id)
                    <option selected value="{{$worker->id}}">{{$worker->name}}</option>
                @else
                    <option value="{{$worker->id}}">{{$worker->name}}</option>
                @endif
            @endforeach
        @endif
    </select>
    <h2>Клиент (введите email):</h2>
    <input list="clients" type="email" name="client" value="{{$jobUpdate->client->email}}">
    <datalist id="clients">
        @foreach($clients as $client)
            <option value="{{$client->email}}"></option>
        @endforeach
    </datalist>
    <h2>Название заказа:</h2>
    <input type="text" name="name" value="{{$jobUpdate->name}}">
    <h2>Описание заказа:</h2>
    <input type="text" name="description" value="{{$jobUpdate->description}}">
    <h2>Цена:</h2>
    <input type="number" name="price" value="{{$jobUpdate->price}}">
    <h2>Статус:</h2>
    <select name="status">
        @if($statuses)
            <option selected value="{{$jobUpdate->status->id}}">{{$jobUpdate->status->name}}</option>
            @foreach($statuses as $status)
                    <option value="{{$status->id}}">{{$status->name}}</option>
            @endforeach
        @endif
    </select>
    <h2>Дата окончания:</h2>
    <input type="date" name="time_end" value="{{$jobUpdate->time_end}}">
    <h2>Фото до:</h2>
    <div class="job_photo">
        @if($jobUpdate->image_before !=null)
            <img src="{{asset($jobUpdate->image_before)}}" alt="Нет фотографии">
        @else
            <img src="{{asset('images/bg.svg')}}" alt="Нет фотографии">
        @endif
        <input type="file" name="image_before">
    </div>
    <h2>Фото после:</h2>
    <div class="job_photo">
        @if($jobUpdate->image_after !=null)
            <img src="{{asset($jobUpdate->image_after)}}" alt="Нет фотографии">
        @else
            <img src="{{asset('images/bg.svg')}}" alt="Нет фотографии">
        @endif
        <input type="file" name="image_after">
    </div>
    <input type="submit" class="btn-green" value="Обновить">
</form>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</main>
@include('mainPage.indexFooter')
