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
        <div id="backToLogin">
            <a href="/logout">Log Out?</a>
        </div>
        <header>
            <div id="title">
                <h1>Yin, Yang, Yum</h1>
                <h2>Breakdown for Chinese Warm &amp; Cool Foods</h2>
            </div>
        </header>
        <div id="wrap">
            <div id="subnav">
                <a href="/all">&laquo; Back to All</a>
            </div>
            <div id="login">
                @if ($food->image != null)
                <div class="bigCircle"><img src="{{$food->image}}"></div>
                @else
                <div class="bigCircle"></div>
                @endif
                <div class="oneFood">
                    <h1>{{$food->name}}</h1>
                    <h2>Category: {{$food->category->category}}</h2>
                    <h2>Thermal Type: {{$food->thermal->thermal}}</h2>
                    <br>
                    <h1>Change the thumbnail of this food</h1>
                    @if (session('successStatus'))
                    <p class="success">{{session('successStatus')}}</p>
                    @endif
                    @if (count($errors) > 0) 
                    <p class="error">
                        @foreach ($errors->all() as $error)
                            {{$error}}
                        @endforeach
                    </p>
                    @endif
                    <form method="post" style="font-size: 0.8em;">
                        {{ csrf_field() }}
                        <input style="width: 200px" type="text" name="image" placeholder="Image URL">
                        <button style="width: 224px" type="submit">Change the thumbnail</button>
                    </form>
                </div>
            </div>
            <div style="clear:both"></div>
        </div>
    </body>
</html>
