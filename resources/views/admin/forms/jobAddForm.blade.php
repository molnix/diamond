<form id="JobAddForm" action="{{route('admin_create_job')}}" method="post" class="main_form" enctype="multipart/form-data">
    @csrf
    <h2>Работник:</h2>
    <select name="worker">
        @if($workers)
            @foreach($workers as $worker)
                <option value="{{$worker->id}}">{{$worker->name}}</option>
            @endforeach
        @endif
    </select>
    <h2>Клиент (введите email):</h2>
    <input list="clients" type="email" name="client" required>
    <datalist id="clients">
        @foreach($clients as $client)
            <option value="{{$client->email}}"></option>
        @endforeach
    </datalist>
    <h2>Название заказа:</h2>
    <input type="text" name="name" required>
    <h2>Описание заказа:</h2>
    <input type="text" name="description" required>
    <h2>Цена:</h2>
    <input type="number" name="price" required>
    <h2>Статус:</h2>
    <select name="status">
        @if($statuses)
            <option selected value="2">Выберите статус</option>
            @foreach($statuses as $status)
                <option value="{{$status->id}}">{{$status->name}}</option>
            @endforeach
        @endif
    </select>
    <h2>Дата окончания:</h2>
    <input type="date" name="time_end" required>
    <h2>Фотография до:</h2>
    <input type="file" name="image_before">
    <input type="submit" class="btn-green">
</form>

