<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width">
    <title>{{  Lang::get('admin.title') }}
    </title>
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/reset.css" /> <!-- RESET STYLESHEET -->

    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/admin-fa.css" /> <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/bootstrap.min.css" /> <!-- MAIN THEME STYLESHEET -->
    <link rel="stylesheet" type="text/css" media="all" href="{{ asset(env('THEME')) }}/css/admin.css" /> <!-- MAIN THEME STYLESHEET -->



    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/admin/jquery3.js"></script>


    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="{{ asset(env('THEME')) }}/js/bootstrap.min.js"></script>



</head>
<body>
<div id="dialogoverlay"></div>
<div id="dialogbox">
    <div>
        <div id="dialogboxhead"></div>
        <div id="dialogboxbody"></div>
        <div id="dialogboxfoot"></div>
    </div>
</div>
<div class="wrapper">
    <div class="maincontent">
        <aside class="sidebar">
            <div class="panel">
                <div class="panel__user">Администратор</div>
                <div class="panel__options"><a class="panel__options-btn" href="#"><i class="fa fa-home"></i></a><a class="panel__options-btn" href="#"><i class="fa fa-envelope"></i>
                        <div class="panel__options-counter">12</div></a></div>
            </div>
            <div class="user">
                <div class="user__photo-container">
                    <div class="user__photo"><img src="../img/content/avatar.jpg" alt=""></div>
                </div>
                <div class="user__name">
                    <div class="user__name-title">Константин Константинов</div><a class="user__name-link" href="#">Профиль</a>
                </div>
            </div>
            <!-- START MAIN NAVIGATION -->
            @yield('navigation')
            <!-- END MAIN NAVIGATION -->
            <a class="menu__link sidebar__exit" href="#">
                <div class="menu__link-icon"><i class="fa fa-power-off"></i></div>
                <div class="menu__link-title">Выйти из профиля</div></a>
        </aside>
        <div class="content">
            <div class="header">
                <div class="header__reload"><a class="header__reload-link" href="#"><i class="fa fa-refresh"></i></a></div>
                <div class="header__search">
                    <form class="header__search-form">
                        <input class="header__search-input" name="" type="text" placeholder="Поиск по панели управления">
                        <button class="header__search-button" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div class="header__user">
                    <div class="header__user-counter">10</div>
                    <div class="header__user-name">Константин Константинов</div>
                    <div class="header__user-photo">
                        <div class="header__user-avatar"><img src="../img/content/avatar.jpg" alt=""></div>
                    </div>
                </div>
                <div class="header__settings"><i class="fa fa-gear"></i></div>
            </div>
            <div class="content-wrapper">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">

                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach

                    </div>
                @endif

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
            @endif
                <!-- START MAIN NAVIGATION -->
                @yield('content')
                <!-- END MAIN NAVIGATION -->
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="footer__text">&copy; Альбина Мухамедиева </div>
    </footer>
</div>

<script type="text/javascript" src="{{ asset(env('THEME')) }}/js/admin/admin.js"></script>
</body>
</html>