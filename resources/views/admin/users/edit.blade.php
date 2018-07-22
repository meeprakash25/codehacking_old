@extends('layouts.admin')

@section('content')

    <h1>Edit</h1>

    @include('includes.displayerrors')

    <div class="col-md-3">
        <img class="img-responsive img-rounded" width="100%"
             src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}"
             alt="{{$user->photo ? '' : 'No user photo'}}">
    </div>
    <div class="col-md-9">

        {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

        <div class="form-group">
            {!! Form::label('name', 'Name') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('email', 'Email') !!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('role_id', 'Role') !!}
            {!! Form::select('role_id', $roles, null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('status', 'Status') !!}
            {!! Form::select('is_active', array(1=>'Active', 0=>'Not Active'), null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('image', 'Image') !!}
            {!! Form::file('image', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Update',['class'=>'btn btn-primary pull-left col-sm-3']) !!}
        </div>

        {!! Form::close() !!}



        {{--DELETE user--}}
        {!! Form::open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy', $user->id]]) !!}

        <div class="form-group">
            {!! Form::submit('Delete',['class'=>'btn btn-danger pull-right col-sm-3']) !!}
        </div>

        {!! Form::close() !!}

    </div>
@stop