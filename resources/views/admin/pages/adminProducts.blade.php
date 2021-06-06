@include('profile.profileHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    @include('admin.adminNav')
    <div id="Products-list" class="main_list">
        <h1>Создать новое изделие</h1>
        @include('admin.forms.addProductForm')
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h1>Список изделий</h1>
        <div id="Products-list_table" class="main_list_overflow">
            @include('admin.tables.productTable')
        </div>
        {{$products->render()}}
    </div>
</main>

@include('mainPage.indexFooter')
