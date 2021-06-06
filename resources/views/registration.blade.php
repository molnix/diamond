@include('authRegHead')
@include('mainPage.indexHeader')
<main id="Main" class="main">
    <div id="Reg" class="reg">
            <form id="Form-reg" method="post" action="/registration" class="reg_form-reg">
            @csrf
            <h2>Регистрация</h2>
            <p>Имя:</p>
            <input type="string" name="name" required>
            <p>Email:</p>
            <input type="email" name="email" required>
            <p>Телефон:</p>
            <input type="telephone" name="telephone" required>
            <p>Пароль:</p>
            <input type="password" name="password" required>
            <input class="btn" type="submit" value="Зарегистрироваться">
        </form>
        <a class="btn-border" href="{{route('login')}}">Авторизация</a>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</main>

@include('mainPage.indexFooter')
