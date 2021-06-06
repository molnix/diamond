
    <table class="main_list_overflow_categories-table">
        <tbody class="main_list_overflow-table_tbody">
        <tr class="table_header">
            <th>id</th>
            <th>name</th>
            <th class="table-danger">Удалить</th>
        </tr>
        @if($categories)
            @foreach($categories as $category)
                <tr class="table_body">
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td><a href="{{route('admin_delete_category',['id'=>$category->id])}}" class="btn-red">Удалить</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

