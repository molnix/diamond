@include('passwordReset.passwordResetHead')
@include('mainPage.indexHeader')
<main id="Main" class="main">
<form method="post">
    @csrf
    <p>Введите новый пароль</p>
    <input name="password" type="password">
    <input class="btn" type="submit">
</form>
</main>
@include('mainPage.indexFooter')