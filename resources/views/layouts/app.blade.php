<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Learnable</title>


    <!-- Styles -->
    <!-- <link href="css/buefy.min.css" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" aria-label="main navigation">
                <div class="navbar-brand" >

                    <!-- Collapsed Hamburger -->


                    <!-- Branding Image -->
                    <a class="navbar-item" href="{{ url('/') }}" >
                        <img src="{{ asset('img/axolotlNormal.svg') }}"  width="48"  >
                    </a>
                    <a class="navbar-item" href="{{ url('/') }}" >
                        <p>Learnable</p>
                    </a>



                </div>

                <div class="navbar-menu" id="navbarBasicExample">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-start">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li class="navbar-item"><a href="{{ route('login') }}">Login</a></li>
                            <li class="navbar-item"><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="navbar-item">
                                <a href="#"   aria-expanded="false">
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>


                            </li>
                            <li class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-item">
                                    Termine
                                </a>
                                <ul class="navbar-dropdown">
                                    <li class="navbar-item">
                                        <a>Erstellen</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a> Gruppe Erstellen</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a> Liste</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-item">
                                    Stundenplan
                                </a>
                            </li>
                            <li class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-item">
                                    Klassen
                                </a>
                                <ul class="navbar-dropdown">
                                    <li class="navbar-item">
                                        <a>IM16A</a>
                                    </li>
                                    <li class="navbar-item">
                                        <a>Lehrkräfte</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="navbar-item">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="js/buefy.min.js"></script>
</body>
</html>
