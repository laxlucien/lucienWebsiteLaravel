<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lucien's Place For Things</title>
        <link rel="stylesheet" href="{{ asset('style/mainStyle.css') }}">
        <link rel="stylesheet" href="{{ asset('style/dropdown.css') }}">
        <style>
            #canvas1 {
                position: absolute;
                z-index: -1;
                top: 0;
                left: 0;
            }
        </style>
    </head>
    <body>
    <canvas id="canvas1"><script src="{{ asset('JavaScript/otherPageBackground.js') }}"></script></canvas>

    @include('layouts.inc.navbar')

    @yield('content')
        
    </body>
</html>