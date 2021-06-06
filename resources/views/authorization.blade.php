@include('authRegHead')
@include('mainPage.indexHeader')
<main id="Main" class="main">
    <div id="Login" class="login">
        <form id="Form-login" class="login_form-login" method="post" action="/authorization">
        @csrf
        <h2>Авторизация</h2>
        <p>Email:</p>
        <input type="email" name="email" required>
        <p>Пароль:</p>
        <input type="password" name="password" required>
        <input class="btn" type="submit" value="Войти">
        </form>
        <a class="btn-border" href="{{route('reg')}}">Регистрация</a>
        <a class="btn-border" href="{{route('passwordReset')}}">Забыли пароль?</a>
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
