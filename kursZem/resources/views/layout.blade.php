<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">

</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="/home">
            <p>Тренировонька!</p>
        </a>
        <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item" href="/about">
                Справонька
            </a>
        </div>
        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    @auth("web")
                        <a class="button is-light" href="/logout">
                            Выход
                        </a>
                    @endauth
                    @guest("web")
                        <a class="button is-primary" href="/reg">
                            <strong>Регистрация</strong>
                        </a>
                        <a class="button is-light" href="/login">
                            Вход
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">@yield('main_content')</div>


</body>
</html>
