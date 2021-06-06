<header id="Header" class="header">
    <nav id="Navigate_PC" class="navigate_pc">
        @auth
            <a href="{{route('profile')}}" class="header_link">Личный кабинет: {{$user->name}}</a>
            <a href="{{route('main')}}" class="header_link">На главную</a>
            <a href="{{route('products')}}" class="header_link">Галерея изделий</a>
            <a href="{{route('logout')}}" class="header_link">Выйти</a>
        @endauth
    </nav>
    <nav id="Navigate_Mobile" class="navigate_mobile">
        <a href="{{route('profile')}}" class="header_link">Личный кабинет: {{$user->name}}</a>
        <p id="NavigateListOpenBtn" class="navigate_list_open-img"></p>
        @auth
            <ul id="NavigateList_Mobile" class="navigate_list">
                <li id="NavigateListCloseBtn" class="navigate_link_close-img"></li>
                <li class="navigate_list_item">
                    <a href="{{route('main')}}" class="header_link">На главную</a>
                </li>
                <li class="navigate_list_item">
                    <a href="{{route('products')}}" class="header_link">Галерея изделий</a>
                </li>
                <li class="navigate_list_item">
                    <a href="{{route('logout')}}" class="header_link">Выйти</a>
                </li>
            </ul>
        @endauth
    </nav>
</header>
