<table>
    <tbody class="main_list_overflow-table_tbody">
    @if($jobs)
        <tr class="table_header">
            <th>id</th>
            <th>Мастер</th>
            <th>Клиент</th>
            <th>Статус</th>
            <th>Название</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Дата создания</th>
            <th>Дата окончания</th>
            <th>Изменить</th>
            <th>Завершить</th>
        </tr>
        @foreach($jobs as $job)
            <tr class="table_body">
                <td>{{$job->id}}</td>
                <td>
                    @if(isset($job->worker->email))
                        {{$job->worker->email}}
                    @else
                        Нет данных о мастере id:
                        {{$job->worker_id}}
                    @endif
                </td>
                <td>{{$job->client->email}}</td>
                <td>
                    @if(isset($job->status->name))
                        {{$job->status->name}}
                    @else
                        Статус: {{$job->status_id}}
                    @endif
                </td>
                <td>{{$job->name}}</td>
                <td>{{$job->description}}</td>
                <td>{{$job->price}}</td>
                <td>{{$job->created_at}}</td>
                <td>{{$job->time_end}}</td>
                <td><a href="{{route('worker_update_job_page',['id'=>$job->id])}}" class="btn-blue">Изменить</a></td>
                <td><a href="{{route('worker_finish_job',['id'=>$job->id])}}" class="btn-green">Завершить</a></td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
