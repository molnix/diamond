@include('profile.profileHead')
@include('mainPage.indexHeader')
<main id="Main" class="main">
    @include('admin.adminNav')
<form action="{{route('admin_update_product',['id'=>$product->id])}}" method="post" name="update_product" enctype="multipart/form-data" class="main_form">
    @csrf
    <h2>Название</h2>
    <input type="text" name="name" value="{{$product->name}}">
    <h2>Описание</h2>
    <input type="text-area" name="description" value="{{$product->description}}">
    <h2>Цена</h2>
    <input type="number" name="price" value="{{$product->price}}">
    <h2>Добавить новые изображения</h2>
    <input type="file" multiple="true" name="images[]"><br>
    <h2>Категории:</h2>
    <select name="category_id" id="">
        @foreach($categories as $category)
            @if($product->category_id == $category->id)
                <option selected value="{{$category->id}}">{{$category->name}}</option>
            @else
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endif
        @endforeach
    </select>
    <input type="submit" class="btn-green" value="Обновить">
</form>
<h2>Изображения изделия</h2>
    <div class="product_images">
        @foreach($product->product_images as $image)
            <div class="product_image">
                <div class="product_image_photo">
                    <img src="{{asset($image->image_url)}}" alt="Нет изображения">
                </div>
                <div class="product_image_actions">
                    <form name="update_image" action="{{route('admin_update_product_update_image',['id'=>$product->id,'image_id'=>$image->id])}}" method="post" enctype="multipart/form-data" class="main_form">
                        @csrf
                        <input type="file" name="update_image_file" required>
                        <input type="submit" value="Заменить фотографию" class="btn-blue">
                    </form>
                    <a class="href-red" href="{{route('admin_update_product_delete_image',['id'=>$product->id,'image_id'=>$image->id])}}">Удалить изображение</a>
                </div>
            </div>
        @endforeach
    </div>
</main>
@include('mainPage.indexFooter')
