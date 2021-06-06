@include('profile.profileHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    @include('admin.adminNav')
    <div id="Categories-list" class="main_list">
        <h1>Создать новую категорию</h1>
        @include('admin.forms.addCategoryForm')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>Список категорий</h1>
        <div id="Categories-list_table" class="main_list_overflow">
            @include('admin.tables.categoryTable')
        </div>
        {{$categories->render()}}
    </div>
</main>

@include('mainPage.indexFooter')
