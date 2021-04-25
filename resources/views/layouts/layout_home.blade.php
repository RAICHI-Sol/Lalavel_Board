<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" >
        <meta http-equiv="X-UA-Compatible" content="ie = edge">
        <link rel = "stylesheet" href = "/laravel/resources/css/app.css">
        <link href="https://fonts.googleapis.com/css?family=Cherry+Swash:700" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
        <title>@yield('title')</title>
    </head>
    <body>
        <header>
            <h1><a href = "./">Home Page</a></h1>
            <form method = "GET" class = "seach_form" action = {{route('result')}}>
                <input type = "search" name = "search" maxlength ="30" placeholder = "検索">
                <button type = "submit"><span class = "fas fa-search"></button>
            </form>
            @yield('header')
        </header>
        <main>
            @yield('main')
        </main>
    </body>
</html>