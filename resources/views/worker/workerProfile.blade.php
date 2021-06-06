@include('profile.profileHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    <h1>Страница мастера:{{$user->email}}</h1>
    <div id="Orders-list" class="main_list">
        <h1>Создать новый заказ</h1>
        @include('worker.forms.addJobForm')
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <h1>Список всех заказов</h1>
        <div id="Worker-Order-Table" class="main_list_overflow">
            @include('worker.tables.orderTable')
        </div>
    </div>

</main>
@include('mainPage.indexFooter')
