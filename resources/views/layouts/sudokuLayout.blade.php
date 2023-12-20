<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width initial-scale=1.0 user-scaleable = no">
        <title>Lucien's Place for Things</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style/sudokuStyle.css">
        <link rel="stylesheet" href="style/sudokuNumber.css">
        <link rel="stylesheet" href="{{ asset('style/dropdown.css') }}">
        <script src="JavaScript/timer.js"></script>
        <script src="JavaScript/sudokuLogic.js"></script>
        <style>
            * {
                font-family: 'Abel', sans-serif;
            }
        </style>
    </head>
    <body>
        <canvas id="canvas1"><script src="JavaScript/otherPageBackground.js"></script></canvas>

        @include('layouts.inc.navbar')

        @yield('content')

    </body>
</html>