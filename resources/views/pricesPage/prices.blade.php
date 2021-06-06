@include('pricesPage.pricesHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">

    <h1 id="Caption1" class="main__caption">Прайс лист</h1>
    <div class="price-list">
        @foreach($work_types as $work_type)
            <div class="price-list__content">
                <h2>{{$work_type->name}}</h2>
                <div class="price-list__content__prices">
                    @foreach($work_type->prices as $price)
                        <p>{{$price->name}}: {{$price->price}}</p>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</main>

@include('mainPage.indexFooter')

