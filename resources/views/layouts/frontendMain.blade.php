<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Lucien's Place For Things</title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Abel&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="style/mainPage.css">
		<link rel="stylesheet" href="{{ asset('style/dropdown.css') }}">
		<script src="JavaScript/mainBackground.js"></script>
		<style>
			* {
				font-family: 'Abel', sans-serif;
			}
		</style>
	</head>
    <body>
        @include('layouts.inc.navbar')
		@yield('content')

    </body>
</html>