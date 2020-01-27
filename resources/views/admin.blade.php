@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h3>Админ панель</h3></div>

        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Аватар</th>
                        <th>Имя</th>
                        <th>Дата</th>
                        <th>Комментарий</th>
                        <th>Действия</th>
                    </tr>
                </thead>

                <tbody>
				@foreach($comments as $comment)  
                    <tr>										
                        <td>
                            <img src="<?= $comment['avatar'] ?>" alt="" class="img-fluid" width="64" height="64">
                        </td>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->dt_add}}</td>
                        <td>{{$comment->text}}</td>
                        <td>
                            @if ($comment->hide = 0)							
                            <a href="/show>" class="btn btn-success">Разрешить</a>

							@else 
                            <a href="/hide" class="btn btn-warning">Запретить</a>
							@endif
                            <a href="/delete" onclick="return confirm('are you sure?')" class="btn btn-danger">Удалить</a>
                        </td>											
                    </tr>
				@endforeach									
				
				
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
