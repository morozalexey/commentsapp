@extends('layouts.app')

@section('content')

<div class="col-md-12">
                     
     <div class="card">
        <div class="card-header"><h3>Комментарии</h3></div>

        <div class="card-body">     
                                       
            <div class="media">             
              <img src="" class="mr-3" alt="..." width="64" height="64">      
              <div class="media-body">
                <h5 class="mt-0"></h5>                                
                <span><small></small></span>                              
                <p></p>                               
              </div>
            </div>  
            
        
        </div>
    </div>                   

</div>
              
<div class="col-md-12" >  
                    
    <div class="card">
       
        <div class="card-header"><h3>Оставить комментарий</h3></div>
            
        <div class="card-body">
        @guest 
        @if (Route::has('register')) 
            <form action="" method="post">  
                {{csrf_field()}}                               
                <div class="alert alert-success" role="alert">Чтобы оставлять комментарии <a href="/login">авторизуйтесь</a> </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Имя</label>
                    <input name="name" class="form-control" id="exampleFormControlTextarea1" />
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Сообщение</label>
                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="btn btn-success">Отправить</div>                                
            </form>
        @endif
        @else      
            <form action="newcomment" method="post">  
            {{csrf_field()}}                             
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Сообщение</label>
                    <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>               
                </div>
                <button type="submit" class="btn btn-success">Отправить</button>                                
            </form>
                 
        </div>
        @endguest
    </div>
    
</div>

@endsection
