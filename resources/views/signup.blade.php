<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Yin, Yang, Yum</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Orienta" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="/css/index.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <div id="title">
                <h1>Yin, Yang, Yum</h1>
                <h2>Breakdown for Chinese Warm &amp; Cool Foods</h2>
            </div>
        </header>
        <div id="wrap">
            <div id="login">
                <h1>Sign Up</h1>
                <p>Welcome to Yin, Yang, Yum. In order to make edits to the database, you must sign up below. If you've already signed up, click Log In on the right instead. </p>

                @if (session('failStatus'))
                <p class="error">{{session('failStatus')}}</p>
                @endif
                <form method="post">
                    {{ csrf_field() }}
                    <input type="text" name="username" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <button type="submit">Sign Up!</button>
                </form>
            </div>
            <div class="module" style="background: #c95961">
                <a href="/login"><h1 style="color: #fff; font-size: 1.6em">Log In  &raquo;</h1></a>
            </div>
            <div style="clear:both"></div>
        </div>
    </body>
</html>
