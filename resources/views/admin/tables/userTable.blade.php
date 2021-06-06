
    <table class="main_list_overflow_users-table">
        <tbody class="main_list_overflow-table_tbody">
            <tr class="table_header">
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th>telephone</th>
                <th>access</th>
                <th class="table-info">Изменить</th>
            </tr>
        @if($allUsers)
            @foreach($allUsers as $allUser)
                <tr class="table_body">
                    <td>{{$allUser->id}}</td>
                    <td>{{$allUser->name}}</td>
                    <td>{{$allUser->email}}</td>
                    <td>{{$allUser->telephone}}</td>
                    <td>
                        @if(isset($allUser->access->name))
                            {{$allUser->access->name}}
                        @else
                            Уровень доступа:{{$allUser->access_id}}. Нет данных в таблице "access".
                        @endif
                    </td>
                    <td><a href="{{route('admin_update_user_page',['id'=>$allUser->id])}}" class="btn-blue">Изменить</a></td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

