<form action="{{route('admin_create_product')}}" method="post" enctype="multipart/form-data" class="main_form">
    @csrf
    <h2>Название</h2>
    <input type="text" name="name">
    <h2>Описание</h2>
    <input type="text-area" name="description">
    <h2>Цена</h2>
    <input type="number" name="price">
    <h2>Изображения</h2>
    <input type="file" multiple="true" name="images[]"><br>
    <h2>Категории:</h2>
    <select name="category_id" id="">
        @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
    </select>
    <input type="submit" class="btn-green">
</form>
