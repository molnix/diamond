@include('mainPage.indexHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">

    <h1 id="Caption1" class="main__caption">О нас</h1>

    <div class="slider">
        <div class="slider__items">
            <div class="slider__item">
                <img class="img-fluid" src="{{asset('images/one.png')}}" alt="c1">
            </div>
            <div class="slider__item">
                <img class="img-fluid" src="{{asset('images/two.png')}}" alt="c2">
            </div>
        </div>
        <p class="slider__control slider__control_prev"></p>
        <p class="slider__control slider__control_next"></p>
    </div>

    <h1 id="Caption2" class="main__caption">Услуги</h1>
    <div class="services-list">
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/ring.svg")}}" alt="Нет изображения">
                </div>
                <h2>Работа с кольцами</h2>
                <p>
                    Увеличение, уменьшение, замена камней, ремонт и правка.
                </p>
            </div>
        </div>
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/welding.svg")}}" alt="Нет изображения">
                </div>
                <h2>Пайка</h2>
                <p>
                    Пайка изломов цепи, кольца, серьги, браслетов.
                </p>
            </div>
        </div>
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/buffing.svg")}}" alt="Нет изображения">
                </div>
                <h2>Чистка и полировка</h2>
                <p>
                    Колец сложной формы, серьги, цепи.
                </p>
            </div>
        </div>
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/circular-refresh-arrows.svg")}}" alt="Нет изображения">
                </div>
                <h2>Замена</h2>
                <p>
                    Пружины в замке карабин, шпрингельного замка.
                </p>
            </div>
        </div>
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/other.svg")}}" alt="Нет изображения">
                </div>
                <h2>Другие услуги</h2>
                <p>
                   Крепление вставки драгоценных камней, проверка бриллиантов.
                </p>
            </div>
        </div>
    </div>


    <h1 id="Caption3" class="main__caption">Галерея выполненных заказов</h1>

    <div id="Gallery" class="gallery">
        @if(isset($finishJobs))
            @foreach($finishJobs as $finishJob)
                <div class="gallery__item">
                    <div class="gallery__container">
                        @if($finishJob->image_before !=null)
                            <img class="gallery__item__img" src="{{asset($finishJob->image_before)}}" alt="Нет изображения">
                        @else
                            <img class="gallery__item__img" src="{{asset('images/bg.svg')}}" alt="Нет фотографии">
                        @endif
                    </div>
                    <div class="gallery__container">
                        @if($finishJob->image_after !=null)
                            <img class="gallery__item__img" src="{{asset($finishJob->image_after)}}" alt="Нет изображения">
                        @else
                            <img class="gallery__item__img" src="{{asset('images/bg.svg')}}" alt="Нет фотографии">
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>



</main>

@include('mainPage.indexFooter')

