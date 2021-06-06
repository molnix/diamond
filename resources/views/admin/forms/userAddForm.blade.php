<form id="UserAddForm" action="{{route('admin_create_user')}}" method="post" class="main_form">
    @csrf
    <h2>Имя:</h2>
    <input type="string" name="name">
    <h2>Email:</h2>
    <input type="email" name="email">
    <h2>Телефон:</h2>
    <input type="telephone" name="telephone">
    <h2>Пароль:</h2>
    <input type="password" name="password">
    <h2>Уровень доступа</h2>
    <select name="access_id">
        @if($access)
            @foreach($access as $userAccess)
                <option value="{{$userAccess->id}}">{{$userAccess->name}}</option>
            @endforeach
        @else
            <option>Нет данных в таблице "access"</option>
        @endif
    </select>
    <input type="submit" class="btn-green">
</form>
