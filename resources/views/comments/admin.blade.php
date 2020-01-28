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
                            <img src="" alt="" class="img-fluid" width="64" height="64">
                        </td>
                        <td>{{$comment->name}}</td>
                        <td>{{$comment->dt_add}}</td>
                        <td>{{$comment->text}}</td>
                        <td>
                            @if ($comment->hide == 1)						
                            
                            <form action="{{ route('comments.show', $comment->id)}}" method="post">
                                @method('PUT')
                                @csrf                            
                                <button class="btn btn-success" type="submit">Разрешить</button>
                            </form>
							@else                             
                            
                            <form action="{{ route('comments.hide', $comment->id)}}" method="post">
                                @method('PUT')
                                @csrf                            
                                <button class="btn btn-warning" type="submit">Запретить</button>
                            </form>
							@endif
                            <form action="{{ route('comments.destroy', $comment->id)}}" method="post">
                                @method('PUT')
                                @csrf                            
                                <button class="btn btn-danger" onclick="return confirm('are you sure?')" type="submit">Удалить</button>
                            </form>
                        </td>											
                    </tr>
				@endforeach									
				
				
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
