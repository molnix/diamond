@include('profile.profileHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    @include('admin.adminNav')
    <div id="Users-list" class="main_list">
        <h1>Создать сотрудника</h1>
        @include('admin.forms.userAddForm')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>Список всех сотрудников</h1>
        <div id="Users-list_table" class="main_list_overflow">
            @include('admin.tables.userTable')
        </div>
        {{$allUsers->render()}}
    </div>
</main>

@include('mainPage.indexFooter')
