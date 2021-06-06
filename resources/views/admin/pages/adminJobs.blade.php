@include('profile.profileHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    @include('admin.adminNav')
    <div id="Orders-list" class="main_list">

        <h1>Создать новый заказ</h1>
        @include('admin.forms.jobAddForm')
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
        <div id="Orders-list_table" class="main_list_overflow">
            @include('admin.tables.orderTable')
        </div>
        {{$jobs->render()}}
    </div>
</main>

@include('mainPage.indexFooter')
