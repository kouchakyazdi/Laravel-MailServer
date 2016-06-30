@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="css/Profile.css">
    <link rel="stylesheet" type="text/css" href="css/LoginRegister.css">
    <link rel="stylesheet" type="text/css" href="css/Users.css">
@endsection

@section('content')
    <body>
    <form action="/profile" method="post" id="registeration" style="margin-left: auto;margin-right: auto;">
        <div style="width: 70%;height: 300px;margin-left: auto;margin-right: auto;">
            <div class="titles">
                <h5>First Name :</h5><br>
                <h5>Last Name :</h5><br>
                <h5>Email :</h5><br>
                <h5>Password :</h5><br>
                <h5>Image :</h5><br>
            </div>
            <div class="inputs">
                <input type="text" name="firstname">
                <input type="text" name="lastname">
                <input type="email" name="email">
                <input type="password" name="password">
                <input type="file" name="image">
            </div>
            <input type="submit" value="Save Changes" style="background-color: #97d9ff">
        </div>
    </form>
    </body>
    <script src="js/jquery-1.12.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "../server.php?profile=true",
                dataType: "xml",
                cache: false,
                async: false,
                success: function (xml) {
                    var data = $(xml).children('data');
                    var contacts = data.children('contacts');

                    var it = '<img src="' + data.children('img').text() + '"><br><span>First Name: </span><sapn >' + data.children('first').text() + '</span><br><span>Last Name: </span><span>' + data.children('last').text() + '</span><br><span>Email: </span><span>' + data.children('username').text() + '</span>';
                    contacts.children('contact').each(function () {
                        var person = '<div class="person"><img src="' + $(this).children('img').text() + '"><br><span>First Name: </span><span >' + $(this).children('first').text() + '</span><br><span>Last Name: </span><span>' + $(this).children('last').text() + '</span><br><span>Email: </span><span>' + $(this).children('username').text() + '</span><br></div>';
                        $("#contacts").append(it);
                    });
                }, error: function (jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                    console.log(jqXHR.responseText);
                    // STOP LOADING SPINNER
                }
            })
        });

    </script>
@endsection