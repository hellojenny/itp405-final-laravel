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
                @if ($thermal == null)
                <a href="/all" class="active">All Foods</a>
                @else
                <a href="/all">All Foods</a>
                @endif

                @if ($thermal == 'cool')
                <a href="/type/cool" class="cool active">Cool (Yin)</a>
                @else
                <a href="/type/cool" class="cool">Cool (Yin)</a>
                @endif

                @if ($thermal == 'warm')
                <a href="/type/warm" class="warm active">Warm (Yang)</a>
                @else
                <a href="/type/warm" class="warm">Warm (Yang)</a>
                @endif

                @if ($thermal == 'neutral')
                <a href="/type/neutral" class="neutral active">Neutral</a>
                @else
                <a href="/type/neutral" class="neutral">Neutral</a>
                @endif
            </div>
            <main>
                <h4>Category: All</h4>
                @foreach ($food as $food)
                @if ($food->thermal->thermal == "cool")
                <div class="food cool">
                @elseif ($food->thermal->thermal == "warm")
                <div class="food warm">
                @else
                <div class="food neutral">
                @endif
                    @if ($food->image == null)
                    <a href="/food/{{$food->id}}"><div class="circle"><h1>?</h1></div></a>
                    @else
                    <a href="/food/{{$food->id}}"><div class="circle"><img src="{{$food->image}}"></div></a>
                    @endif
                    <h1>{{$food->name}}</h1>
                    <h2>Category: <a href="/type/{{$food->thermal->thermal}}/{{$food->category->category}}">{{$food->category->category}}</a></h2>
                    <h2>Thermal Type: <a href="/type/{{$food->thermal->thermal}}">{{$food->thermal->thermal}}</a></h2>
                </div>
                @endforeach
            </main>
        </div>
    </body>
</html>
