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
    <body class = "home">
        <header>
            <div class = "header">
                <h1><a href = {{route('home_get')}}>Home Page</a></h1>
                <form method = "GET" class = "seach_form" action = {{route('result')}}>
                    <input type = "search" name = "search" maxlength ="30" placeholder = "検索">
                    <button type = "submit"><span class = "fas fa-search"></button>
                </form>
                @if(Auth::check())
                    <a href = {{route('make_get')}} class = "make_board"><i class="fas fa-edit"></i>投稿する</a>
                    <label for = "menu">{{Auth::user()->name}}さん<i class = "fas fa-user-circle"></i></label>
                    <input type="checkbox" id = "menu">
                    <div class = "menu">
                        <a href = {{route('profile_get',Auth::user()->id)}}><i class="far fa-address-card"></i>プロフィール</a>
                        <a href = {{route('set_prof')}}><i class="fas fa-user-cog"></i>設定</a>
                        <a href = {{ route('logout') }} onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>ログアウト</a>
                    </div>
                    <form id="logout-form" action= {{ route('logout') }} method="POST">
                        @csrf
                    </form>
                @else
                    <label for = "menu">ゲストさん<i class = "fas fa-user-circle"></i></label>
                    <input type="checkbox" id = "menu">
                    <div class = "menu">
                        <a href = {{route('login')}}><i class="fas fa-sign-in-alt"></i>ログイン</a>
                        <a href = {{route('create')}}><i class="fas fa-user-plus"></i>アカウント作成</a>
                    </div>
                @endif
            </div>
        </header>
        <main>
            @yield('menu')
            @yield('main')
        </main>
        <footer><p>Copyright © 2021 RAICHI All Rights Reserved.<p></footer>
    </body>
</html>