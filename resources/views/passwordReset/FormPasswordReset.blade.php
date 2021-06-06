@include('passwordReset.passwordResetHead')
@include('mainPage.indexHeader')
<main id="Main" class="main">
<form method="post">
    @csrf
    <p>Для сброса пароля введите email.</p>
    <p>После чего проверьте почту.</p>
    <input name="email" type="text">
    <input class="btn" type="submit">
</form>
</main>
@include('mainPage.indexFooter')