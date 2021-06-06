@include('locationPage.locationHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    <h1 id="Caption4" class="main__caption">Как нас найти</h1>

    <div id="Location" class="location">
        <div class="location_map">
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A55b6d1e68c92d42f311c2a36b28462c7e428cf6e0fe84feacb9ee79104f593dc&amp;source=constructor" width="650" height="550" frameborder="0"></iframe>
        </div>
        <div class="location_images">

        </div>
    </div>
</main>

@include('mainPage.indexFooter')
