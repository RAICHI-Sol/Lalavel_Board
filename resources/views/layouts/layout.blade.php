<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie = edge">
        <link rel = "stylesheet" href = "{{ secure_asset('app.css')}}">
        <link href="https://fonts.googleapis.com/css?family=Cherry+Swash:700" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
        <title>@yield('title')</title>
    </head>
    <body>
        @yield('main')
    </body>
</html>