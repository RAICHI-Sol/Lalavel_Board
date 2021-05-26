<!DOCTYPE html>

<html>
    <head>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie = edge">
        <link rel = "stylesheet" href = "{{ secure_asset('app.css')}}">
        <meta name = "viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://fonts.googleapis.com/css?family=Cherry+Swash:700" rel="stylesheet">
        <link href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=M+PLUS+1p" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
        <title>@yield('title')</title>
    </head>
    @if((!Request::is('chat/mypage/*')) && (!Request::is('chat/*')))
        <body class = "home">
    @else
        <body>
    @endif
        <header>
            <div class = "header">
                <h1><a href = {{route('home_get')}}>Home Page</a></h1>
                <form method = "GET" class = "seach_form" action = {{route('result')}}>
                    <input type = "search" name = "search" maxlength ="30" placeholder = "検索">
                    <button type = "submit"><span class = "fas fa-search"></button>
                </form>
                @if(Auth::check())
                    <a href = {{route('make_get')}} class = "make_board"><i class="fas fa-edit"></i>投稿する</a>
                    <label for = "menu">{{Auth::user()->name}}<i class = "fas fa-user-circle"></i></label>
                    <input type="checkbox" id = "menu">
                    <div class = "menu">
                        <a href = {{route('profile_get',Auth::id())}}><i class="far fa-address-card"></i>マイページ</a>
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
        @if((!Request::is('chat/mypage/*')) && (!Request::is('chat/*')))
            <footer><p>Copyright © 2021 RAICHI All Rights Reserved.<p></footer>
        @endif
        @yield('fixed')
    </body>
    @yield('script')
</html>