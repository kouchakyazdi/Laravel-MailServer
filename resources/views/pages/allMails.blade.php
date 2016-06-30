@extends('layouts.app')

@section('content')
    <h1>Emails</h1>
    @foreach($emails as $email)
        <h2>title : {{$email->title}}</h2>
        <h5>body : {{$email->body}}</h5>
        <h5>created_at : {{$email->created_at}}</h5>
    @endforeach

@endsection