<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
    <style>
        body {
            background: #ffffff;
            height: 500px;
        }

       

        #login-container {
            width: 35%;
            background: #ffffff;
            margin-right: 180px;
            margin-left: auto;
            margin-top: 7%;
            float: right;
            border: 4px solid #083054;
            border-radius: 20px !important;
            padding: 50px 20px;
            padding: 0;
            height: 30em !important;
        }

        .imagen {
            margin-top: -20px !important;
            margin-left: 15%;
            width: 15%;
            height: 50%;
        }

        #encabezadologin {
            text-align: center;
            font-size: 2em;
            font-family: 'Fredoka One', cursive !important;
            color: #083054;
            letter-spacing: 5px;
            border: 4px solid #083054;
            width: 80% !important;
            margin-left: 100px;
            margin-bottom: 50px;
            margin-top: -46px;
            background: white;
            border-radius: 10px !important;
            margin-left: auto;
            margin-right: auto;
        }

        input {
            margin-bottom: 25px;
            margin-left: 8%;
            width: 200%!important;
            text-align: left;
            border-top: none !important;
            border-right: none !important;
            border-bottom: solid gray !important;
            border-left: none !important;
            height: 50px !important;
        }

        input::placeholder {
            color: black !important;
            opacity: 0.7555555 !important;
        }

       
        #login {
            width: 350px;
            height: 50px;
            margin-left: 12%;
            margin-top: 10px;
            background: white;
            border: 2px solid #083054;
            color: black;
            font-size: 2em;
            padding-top: 0;
        }

        #login:hover {
            color: white;
            background: #083054;
            border-top: none !important;
            border-right: none !important;
            border-bottom: solid black !important;
            border-left: none !important;
        }


        #email {
            background: url('../fondos/iconuser.png') no-repeat center right;
            background-size: 1.65em;
        }

        #password {
            background: url('../fondos/iconpass.png') no-repeat center right;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav>
            <div class="container">
                <div class="navbar-header">
                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <!-- <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a> -->
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                      
                        @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>