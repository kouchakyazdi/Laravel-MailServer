@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="css/ComposeEmail.css">
@endsection

@section('content')
    <script src="js/jquery-1.12.0.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <div id="container">
        <div class="forms">
            <form method="post" action="/compose" id="send">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="titles">
                    <h5>To:</h5>
                    <h5>Subject:</h5>
                    <h5>Text:</h5>
                    <h5 id="attach">Attachment:</h5>
                    <input type="submit" value="Send">
                </div>
                <div class="inputs">
                    <input type="text" name="to">
                    <input type="text" name="subject">
                    <textarea rows="100" cols="70" name="article-ckeditor" id="article-ckeditor"></textarea>
                    <input type="file" name="attachment">
                </div>
                <script>
                    CKEDITOR.replace('article-ckeditor');
                </script>
            </form>
        </div>
    </div>

@endsection