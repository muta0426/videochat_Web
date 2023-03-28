<DOCTYPE HTML>
    <html lang="ja">

    <head>
        <meta charset="UTF-8">
        <title>@yield('title')｜nodoame.net</title>
        <meta name="description" itemprop="description" content="@yield('description')">
        <meta name="keywords" itemprop="keywords" content="@yield('keywords')">
        <!-- CSS読み込み -->
        <link href="/css/top.css" rel="stylesheet">
        <link href="/css/sidemenu.css" rel="stylesheet">
        <link href="/css/header.css" rel="stylesheet">
        @yield('pageCss')
    </head>

    <body>

        @yield('header')

        <div class="contents">

            <!-- 共通メニュー -->
            <div class="sub">
                @yield('submenu')
            </div>


            
            @yield('content')


        </div>

    </body>

    </html>