<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test for the fighting game</title>
        <link rel="stylesheet" href="{{ asset('style/mainStyle.css') }}">
        <link rel="stylesheet" href="{{ asset('style/dropdown.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <style>
            .BitText {
                box-sizing: border-box;
                font-family: 'Press Start 2P', cursive;
            }

            .navText {
                font-family: 'Abel', sans-serif;
            }
        </style>
    </head>
    <body>
        @include('layouts.inc.navbar')

        @yield('content')
    </body>
</html>