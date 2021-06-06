@include('jalleryProductsPage.productHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    <div class="slider">
        <div class="slider__items">
            @foreach($product->product_images as $image)
                <div class="slider__item">
                    <img class="img-fluid" src="{{asset($image->image_url)}}" alt="c1">
                </div>
            @endforeach
        </div>
        <p class="slider__control slider__control_prev"></p>
        <p class="slider__control slider__control_next"></p>
    </div>
    <div class="product_wrapper">
        <div class="product_info">
            <h2>{{$product->name}}</h2>
            <p>Цена: {{$product->price}} руб.</p>
            <p>Описание:</p>
            <p>{{$product->description}}</p>
        </div>
    </div>
</main>

@include('mainPage.indexFooter')
