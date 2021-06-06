<header id="Header" class="header">
    <nav id="Navigate_PC" class="navigate_pc">
        <a href="{{route('main')}}" class="navigate_link-logo"></a>
        <a href="{{route('main')}}" class="navigate_link">

        </a>
        <ul id = "NavigateList_PC" class="navigate_link navigate_list">
            <li class="navigate_list_item">
                <a href="{{route('main')}}" class="navigate_list_item_link">Главная</a>
            </li>
            <li class="navigate_list_item">
                <a href="{{route('products')}}" class="navigate_list_item_link">Галерея изделий</a>
            </li>
            <li class="navigate_list_item">
                <a href="{{route('location_page')}}" class="navigate_list_item_link">Карта</a>
            </li>
            <li class="navigate_list_item">
                <a href="{{route('prices_page')}}" class="navigate_list_item_link">Прайс лист</a>
            </li>
            @guest
                <li class="navigate_list_item">
                    <a href="{{route('login')}}" class="navigate_list_item_link">Войти</a>
                </li>
                <li class="navigate_list_item">
                    <a href="{{route('reg')}}" class="navigate_list_item_link">Зарегистрироваться</a>
                </li>
            @endguest
            @auth
                <li>
                    <a href="{{route('profile')}}" class="navigate_list_item_link">Личный кабинет</a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="navigate_list_item_link">Выйти</a>
                </li>
            @endauth
        </ul>
    </nav>

    <nav id="Navigate_Mobile" class="navigate_mobile">
        <a href="{{route('main')}}" class="navigate_link-logo"></a>
        <a href="{{route('main')}}" class="navigate_link">
            <p>Алмаз</p>
        </a>
        <p id="NavigateListOpenBtn" class="navigate_list_open-img"></p>
        <ul id = "NavigateList_Mobile" class="navigate_link navigate_list">
            <li id="NavigateListCloseBtn" class="navigate_link_close-img"></li>
            <li class="navigate_list_item">
                <a href="{{route('main')}}" class="navigate_list_item_link">Главная</a>
            </li>
            <li class="navigate_list_item">
                <a href="{{route('products')}}" class="navigate_list_item_link">Галерея изделий</a>
            </li>
            <li class="navigate_list_item">
                <a href="{{route('location_page')}}" class="navigate_list_item_link">Карта</a>
            </li>
            <li class="navigate_list_item">
                <a href="{{route('prices_page')}}" class="navigate_list_item_link">Прайс лист</a>
            </li>
            @guest
                <li class="navigate_list_item">
                    <a href="{{route('login')}}" class="navigate_list_item_link">Войти</a>
                </li>
                <li class="navigate_list_item">
                    <a href="{{route('reg')}}" class="navigate_list_item_link">Зарегистрироваться</a>
                </li>
            @endguest
            @auth
                <li>
                    <a href="{{route('profile')}}" class="navigate_list_item_link">Личный кабинет</a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="navigate_list_item_link">Выйти</a>
                </li>
            @endauth
        </ul>
    </nav>
</header>
