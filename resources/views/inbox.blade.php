@extends('layouts.app')

@section('head')
    <link rel="stylesheet" type="text/css" href="css/Inbox.css">
@endsection

@section('content')


    <div id="header">
        <h1>Inbox</h1>
    </div>

    <div id="box">
        <h5 id="refresh">Refresh</h5>
        <h5 id="compose">Compose</h5>
        <h5 id="inbox">Inbox</h5>
        <h5 id="sent">Sent</h5>
        Num of Mail:<input type="text" name="numOfMail" id="numOfMail" value="4"><br>
        <input type="radio" name="sortby" id="date" checked="checked" value="date">Sort By Date<br>
        <input type="radio" name="sortby" id="sender" checked="checked" value="sender">Sort By sender<br>
        <input type="radio" name="sortby" id="attach" checked="checked" value="attach">Sort By attachment<br>

    </div>
    <div id="mails">
        <div class="eachMail">
            <div class="from">ali</div>
            <div class="subject">hello!</div>
            <div class="text">this is my first email...</div>
            <div class="date">3:02 95/4/3</div>
        </div>
        <div class="eachMail">
            <div class="from">zahra</div>
            <div class="subject">back to school email</div>
            <div class="text">Hey! I have to go back the next monday.</div>
            <div class="date">11:34 95/3/2</div>
        </div>
    </div>
    {{--scripts--}}
    <script src="js/jquery-1.12.0.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            var numOfMail = $("#numOfMail").val();
            $.ajax({
                type: "GET",
                url: "../server.php?inbox=true&nom=" + numOfMail,
                dataType: "xml",
                cache: false,
                async: false,
                success: function (xml) {
                    var all = $(xml).children('mails').children("mail");
                    all.each(function () {
                        var email = 'div class="eachMail">' + '<div class="from">' + $(this).children("from").text();
                        email += '</div><div class="subject">' + $(this).children("subject").text();
                        email += '</div><div class="text">' + $(this).children("text").text();
                        email += '</div><div class="date">' + $(this).children("date").text() + '</div></div>';
                        $("#mails").append(email);
                        if ($(this).attr("read") !== undefined) {//the email has been read
                            $("mails").children(":last").css('background-color', 'green');
                        } else if ($(this).attr("spam") !== undefined) {
                            $("mails").children(":last").css('background-color', 'yellow');
                        } else {
                            $("mails").children(":last").css('background-color', 'white');
                        }
                    });
                    $(document).on('click', '.eachMail', function () {
                        window.location = "../server.php?email=true & from=" + $(this).children(".from").text() + "& date=" + $(this).children(".date").text();
                    });
                }, error: function (jqXHR, textStatus, errorThrown) {
                    // Handle errors here
                    console.log('ERRORS: ' + textStatus);
                    console.log(jqXHR.responseText);
                    // STOP LOADING SPINNER
                }
            });

            $(document).on('click', '#refresh', function () {
                numOfMail = $("#numOfMail").val();
                $.ajax({
                    type: "GET",
                    url: "../server.php?refresh=true&nom=" + numOfMail,
                    dataType: "xml",
                    cache: false,
                    async: false,
                    success: function (xml) {
                        var all = $(xml).children('mails').children("mail");
                        all.each(function () {
                            var email = 'div class="eachMail">' + '<div class="from">' + $(this).children("from").text();
                            email += '</div><div class="subject">' + $(this).children("subject").text();
                            email += '</div><div class="text">' + $(this).children("text").text();
                            email += '</div><div class="date">' + $(this).children("date").text() + '</div></div>';
                            $("#mails").append(email);
                            if ($(this).attr("read") !== undefined) {//the email has been read
                                $("mails").children(":last").css('background-color', 'green');
                            } else if ($(this).attr("spam") !== undefined) {
                                $("mails").children(":last").css('background-color', 'yellow');
                            } else {
                                $("mails").children(":last").css('background-color', 'white');
                            }
                        });
                        $(document).on('click', '.eachMail', function () {
                            window.location = "../server.php?email=true & from=" + $(this).children(".from").text() + "& date=" + $(this).children(".date").text();
                        });
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        // Handle errors here
                        console.log('ERRORS: ' + textStatus);
                        console.log(jqXHR.responseText);
                        // STOP LOADING SPINNER
                    }

                });
            });

            $(document).on('click', '#compose', function () {
                window.location = '{{url('/compose')}}';
            });

            $(document).on('click', '#inbox', function () {
                numOfMail = $("#numOfMail").val();
                $("#mails").empty();
                $.ajax({
                    type: "GET",
                    url: "../server.php?inbox=true&nom=" + numOfMail,
                    dataType: "xml",
                    cache: false,
                    async: false,
                    success: function (xml) {
                        var all = $(xml).children('mails').children("mail");
                        all.each(function () {
                            var email = 'div class="eachMail">' + '<div class="from">' + $(this).children("from").text();
                            email += '</div><div class="subject">' + $(this).children("subject").text();
                            email += '</div><div class="text">' + $(this).children("text").text();
                            email += '</div><div class="date">' + $(this).children("date").text() + '</div></div>';
                            $("#mails").append(email);
                            if ($(this).attr("read") !== undefined) {//the email has been read
                                $("mails").children(":last").css('background-color', 'green');
                            } else if ($(this).attr("spam") !== undefined) {
                                $("mails").children(":last").css('background-color', 'yellow');
                            } else {
                                $("mails").children(":last").css('background-color', 'white');
                            }
                        });
                        $(document).on('click', '.eachMail', function () {
                            window.location = "../server.php?email=true & from=" + $(this).children(".from").text() + "& date=" + $(this).children(".date").text();
                        });
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        // Handle errors here
                        console.log('ERRORS: ' + textStatus);
                        console.log(jqXHR.responseText);
                        // STOP LOADING SPINNER
                    }
                });
            });
            $(document).on('click', '#sent', function () {
                numOfMail = $("#numOfMail").val();
                $("#mails").empty();
                $.ajax({
                    type: "GET",
                    url: "../server.php?sent=true&nom=" + numOfMail,
                    dataType: "xml",
                    cache: false,
                    async: false,
                    success: function (xml) {

                        var all = $(xml).children('mails').children("mail");
                        all.each(function () {
                            var email = 'div class="eachMail">' + '<div class="from">' + $(this).children("to").text();
                            email += '</div><div class="subject">' + $(this).children("subject").text();
                            email += '</div><div class="text">' + $(this).children("text").text();
                            email += '</div><div class="date">' + $(this).children("date").text() + '</div></div>';
                            $("#mails").append(email);
                            if ($(this).attr("read") !== undefined) {//the email has been read
                                $("mails").children(":last").css('background-color', 'green');
                            } else if ($(this).attr("spam") !== undefined) {
                                $("mails").children(":last").css('background-color', 'yellow');
                            } else {
                                $("mails").children(":last").css('background-color', 'white');
                            }
                        });
                        $(document).on('click', '.eachMail', function () {
                            window.location = "../server.php?email=true & from=" + $(this).children(".to").text() + "& date=" + $(this).children(".date").text();
                        });
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        // Handle errors here
                        console.log('ERRORS: ' + textStatus);
                        console.log(jqXHR.responseText);
                        // STOP LOADING SPINNER
                    }
                });
            });


            $('input[type=radio][name=sortby]').change(function () {
                numOfMail = $("#numOfMail").val();
                $("#mails").empty();
                $.ajax({
                    type: "GET",
                    url: "../server.php?inbox=true&sortby=" + this.value + "&nom=" + numOfMail,
                    dataType: "xml",
                    cache: false,
                    async: false,
                    success: function (xml) {
                        var all = $(xml).children('mails').children("mail");
                        all.each(function () {
                            var email = 'div class="eachMail">' + '<div class="from">' + $(this).children("from").text();
                            email += '</div><div class="subject">' + $(this).children("subject").text();
                            email += '</div><div class="text">' + $(this).children("text").text();
                            email += '</div><div class="date">' + $(this).children("date").text() + '</div></div>';
                            $("#mails").append(email);
                            if ($(this).attr("read") !== undefined) {//the email has been read
                                $("mails").children(":last").css('background-color', 'green');
                            } else if ($(this).attr("spam") !== undefined) {
                                $("mails").children(":last").css('background-color', 'yellow');
                            } else {
                                $("mails").children(":last").css('background-color', 'white');
                            }
                        });
                        $(document).on('click', '.eachMail', function () {
                            window.location = "../server.php?email=true & from=" + $(this).children(".from").text() + "& date=" + $(this).children(".date").text();
                        });
                    }, error: function (jqXHR, textStatus, errorThrown) {
                        // Handle errors here
                        console.log('ERRORS: ' + textStatus);
                        console.log(jqXHR.responseText);
                        // STOP LOADING SPINNER
                    }
                });
            });

        });

    </script>
@endsection

















{{--inside section--}}
{{--<div class="container">--}}
{{--<div class="row">--}}
{{--<div class="col-md-10 col-md-offset-1">--}}
{{--<div class="panel panel-default">--}}
{{--<div class="panel-heading">Dashboard</div>--}}

{{--<div class="panel-body">--}}
{{--You are logged in!--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}