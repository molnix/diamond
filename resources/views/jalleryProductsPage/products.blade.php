@include('jalleryProductsPage.jalleryProductsHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    <h1 class="main__caption">Галерея изделий</h1>
    <div class="filters">
        <ul class="filters_list">
            <li class="filters_list_item">
                <a href="{{route('products')}}" class="filters_list_item_link">Всё</a>
            </li>
            @if(isset($categories))
                @foreach($categories as $category)
                <li class="filters_list_item">
                    <a href="{{route('products')}}?categories={{$category->id}}" class="filters_list_item_link">{{$category->name}}</a>
                </li>
                @endforeach
            @endif
        </ul>
    </div>

    <div class="gallery">
        @include('jalleryProductsPage.gallery')
    </div>
    {{$products->render()}}
</main>

@include('mainPage.indexFooter')
