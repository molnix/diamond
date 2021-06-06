@include('mainPage.indexHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">

    <h1 id="Caption1" class="main__caption">О нас</h1>

    <div class="slider">
        <div class="slider__items">
            <div class="slider__item">
                <img class="img-fluid" src="{{asset('images/logo2.png')}}" alt="c1">
            </div>
            <div class="slider__item">
                <img class="img-fluid" src="{{asset('images/logo.png')}}" alt="c2">
            </div>
            <div class="slider__item">
                <img class="img-fluid" src="{{asset('images/close.png')}}" alt="c3">
            </div>
            <div class="slider__item">
                <img class="img-fluid" src="{{asset('images/diamond.png')}}" alt="c4">
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
                <h2>Заголовок</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/ring.svg")}}" alt="Нет изображения">
                </div>
                <h2>Заголовок</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/ring.svg")}}" alt="Нет изображения">
                </div>
                <h2>Заголовок</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/ring.svg")}}" alt="Нет изображения">
                </div>
                <h2>Заголовок</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                </p>
            </div>
        </div>
        <div class="service-block">
            <div class="service-block_info">
                <div class="service-block_info_img">
                    <img src="{{asset("images/ring.svg")}}" alt="Нет изображения">
                </div>
                <h2>Заголовок</h2>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
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

