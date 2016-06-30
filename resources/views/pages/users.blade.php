@extends('layouts.app')

@section('content')
    <h1 class="center-block text-center">users</h1>
    <div class="text-center midtext center-block " style="margin-left: 90px ">
        @foreach($users as $user)
            <form class="center-block" action="/users" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="name" value="{{$user->name}}">
                <input type="hidden" name="email" value="{{$user->email}}">
                <div class="center-block well col-lg-3 text-center" style="margin: 30px">
                    <h5 name="name" class="text-center">Name : {{$user->name}}</h5>
                    <h5 name="email" class="text-center">Email : {{$user->email}}</h5>
                    <button class=" text-center btn btn-primary btn-md">Add to Contacts</button>
                </div>
            </form>
        @endforeach
    </div>
    {{--{{$users}}--}}
@endsection