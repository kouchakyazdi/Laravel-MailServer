@extends('layouts.app')

@section('content')

    {!! Form::open(array('url' => '/create')) !!}
    <div class="form-group">
        {!! Form::label('name', 'value' , ['style' => 'color:red']) !!}
        {!! Form::text('namef' , 'value' , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'value' , ['style' => 'color:red']) !!}
        {!! Form::textarea('name' , 'value' , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('add' ,['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}


@endsection