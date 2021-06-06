<table class="main_list_overflow_products-table">
        <tbody class="main_list_overflow-table_tbody">
        <tr class="table_header">
            <th>id</th>
            <th>Название</th>
            <th>Цена</th>
            <th class="table-info">Изменить</th>
            <th class="table-danger">Удалить</th>
        </tr>
        @if($products)
            @foreach($products as $product)
                <tr class="table_body">
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td><a href="{{route('admin_update_product_page',['id'=>$product->id])}}" class="btn-blue">Изменить</a></td>
                    <td><a href="{{route('admin_delete_product',['id'=>$product->id])}}" class="btn-red">Удалить</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
