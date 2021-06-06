@include('profile.profileHead')
@include('mainPage.indexHeader')
<main id="Main" class="main">
    @include('admin.adminNav')
<form method="post" class="main_form">
    @csrf
    <h2>Имя:</h2>
    <input type="string" name="name" value="{{$userUpdate->name}}">
    <h2>Email:</h2>
    <input type="email" name="email" value="{{$userUpdate->email}}">
    <h2>Телефон:</h2>
    <input type="telephone" name="telephone" value="{{$userUpdate->telephone}}">
    <h2>Пароль:</h2>
    <input type="password" name="password">
    <h2>Уровень доступа</h2>
    <select name="access_id">
        @if($access)
            @foreach($access as $userAccess)
                @if($userAccess->id === $userUpdate->access->id)
                <option selected value="{{$userUpdate->access->id}}">{{$userUpdate->access->name}}</option>
                @else
                <option value="{{$userAccess->id}}">{{$userAccess->name}}</option>
                @endif
            @endforeach
        @else
            <option>Нет данных в таблице "access"</option>
        @endif
    </select>
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
