<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>BGES TELKOM</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
{!! Html::style("/css/style.css") !!}

<!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
<!--[if lt IE 9]>
{!! Html::script('js/respond.min.js') !!}
{!! Html::script('js/html5shiv.js') !!}
        <!-- Place favicon.ico in the root directory -->
{!! Html::style('https://fonts.googleapis.com/css?family=Lato:400,300,700') !!}
{!! Html::style('css/normalize.css') !!}
{!! Html::style('css/main.css') !!}
{!! Html::style('css/bootstrap.min.css') !!}
{!! Html::style('css/font-awesome.min.css') !!}
{!! Html::style('css/owl.carousel.css') !!}
{!! Html::style('css/responsive.css') !!}
{!! Html::style('css/style.css') !!}

<!-- data table-->
    {!! Html::style('css/jquery.dataTables.css') !!}
    {!! Html::style('css/dataTables.bootstrap.css') !!}
    {!! Html::script('js/jquery.js') !!}
    {!! Html::script('js/jquery.dataTables.min.js') !!}
    {!! Html::script('js/dataTables.bootstrap.min.js') !!}
    {!! Html::script('js/bootstrap.min.js') !!}


</head>
<body class="login-page">
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    BGES TELKOM
                </a>
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
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
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
<script src="/js/app.js"></script>
</body>
</html>
