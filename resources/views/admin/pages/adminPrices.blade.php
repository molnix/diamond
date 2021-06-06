@include('profile.profileHead')
@include('mainPage.indexHeader')

<main id="Main" class="main">
    @include('admin.adminNav')
    <div>
        <form action="{{route('admin_create_work_type')}}" method="post" class="main_form">
            @csrf
            <h2>Создать раздел</h2>
            <input type="text" name="name">
            <input type="submit" value="Создать" class="btn-green">
        </form>
        <form action="{{route('admin_create_price')}}" method="post" class="main_form">
            @csrf
            <h2>Создать новую запись в разделе</h2>
            <select name="work_type_id" id="">
                @foreach($work_types as $work_type)
                    <option value="{{$work_type->id}}">{{$work_type->name}}</option>
                @endforeach
            </select>
            <h3>Услуга:</h3>
            <input type="text" name="name">
            <h3>Цена:</h3>
            <input type="text" name="price">
            <input type="submit" value="Создать" class="btn-green">
        </form>
        <div>
            <h2>Прайс лист:</h2>
            @foreach($work_types as $work_type)
                <div class="price-list">
                    <p>{{$work_type->name}} - <a href="{{route('admin_delete_work_type',['id'=>$work_type->id])}}" class="href-red">Удалить</a></p>
                    <div class="price-list__content">
                        @foreach($work_type->prices as $price)
                            <p>{{$price->name}}: {{$price->price}} - <a href="{{route('admin_delete_price',['id'=>$price->id])}}" class="href-red">Удалить</a></p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</main>

@include('mainPage.indexFooter')
