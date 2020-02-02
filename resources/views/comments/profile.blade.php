@extends('layouts.app')

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header"><h3>Профиль пользователя</h3></div>

        <div class="card-body">
            
            <div class="row">			
            
                <div class="col-md-8">

                    <div class="card-body"> 
                        <form action="{{ route('comments.changename') }}" method="POST"> 
                        @csrf
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Name</label>
                                <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{ $user->name }}">
                            </div>

                            <div class="col-md-12">
                                <button class="btn btn-warning">Change Name</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                    <form action="{{ route('comments.changeemail') }}" method="POST">  
                    @csrf
                        <div class="form-group">
                                <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" name="email" id="exampleFormControlInput1" value="{{ $user->email }}">
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-warning">Change Email</button>
                        </div>
                    </form>
                    </div>

                    <div class="card-body"> 
                        <form action="{{ route('comments.changeavatar') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Avatar</label>
                            <input type="file" class="form-control" name="avatar" id="exampleFormControlInput1">						
                        </div>
                        <div class="col-md-12">
                            <button class="btn btn-warning">Change Avatar</button>
                        </div>
                    </div>
                    
                    </form>
                </div>
                
                <div class="col-md-4">
                    <img src="{{ $user->avatar }}" class="img-fluid"/>
                </div>
                    
                
            </div>
            
        </div>
    </div>
</div>

<!--
<div class="col-md-12" style="margin-top: 20px;">
    <div class="card">
        <div class="card-header"><h3>Безопасность</h3></div>

        <div class="card-body">

            <form action="/changepassword" method="post">
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Current password</label>
                            <input type="password" name="current_password" class="form-control" id="exampleFormControlInput1">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">New password</label>
                            <input type="password" name="new_password" class="form-control" id="exampleFormControlInput1">                
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlInput1">Password confirmation</label>
                            <input type="password" name="password_confirmation" class="form-control" id="exampleFormControlInput1">
                        </div>

                        <button class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
-->
@endsection
