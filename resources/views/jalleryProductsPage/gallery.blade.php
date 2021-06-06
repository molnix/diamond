@if(isset($products))
    @foreach($products as $product)
        <div class="gallery_item">
            <div class="gallery_item_images">
                @for($i=0;$i<count($product->product_images);$i++)
                    @if($i==0)
                    <img class="gallery_item_image" src="{{asset($product->product_images[$i]->image_url)}}" alt="Нет изображения">
                    @endif
                @endfor
            </div>
            <div class="gallery_item_info">
                <p>{{$product->name}}</p>
                <p>{{$product->price}} руб.</p>
                <a class="gallery_item_link" href="{{route('product_page',['id'=>$product->id])}}">Перейти к товару</a>
            </div>
        </div>
    @endforeach
@endif
