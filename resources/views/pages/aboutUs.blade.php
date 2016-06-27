@extends('pages.container')

@section('bodyContainer')
    <div class="container">
        <div class="content">
            <div class="title">{!! $name[0] !!} {!! $name[1] !!} {{$family[0]}} {{$family[1]}}</div>
        </div>
    </div>

@stop

@section('topSharedScript')
    <script>

    </script>
@stop

@section('botSharedScript')
    <script>

    </script>
@stop