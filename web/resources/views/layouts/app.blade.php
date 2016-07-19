<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Arduino Labs Controller</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="{{URL::to('assets/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('assets/css/lato-css.css')}}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::to('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('assets/css/dataTables.bootstrap.css')}}">
        <link rel="stylesheet" href="{{URL::to('assets/css/style.css')}}">

        <!-- Scripts -->
        <script src="{{URL::to('assets/js/jQuery-2.2.0.min.js')}}"></script>
        <script src="{{URL::to('assets/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{URL::to('assets/js/dataTables.bootstrap.min.js')}}"></script>
        <script src="{{URL::to('assets/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{URL::to('assets/js/jquery.mask.js')}}"></script>
        <script src="{{URL::to('assets/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#example').DataTable({
                            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "Todos os"]],
                            "pageLength": 10,
                            "stateSave": true,
                            "stateDuration": 60 * 60 * 24 * 365 * 2,
                            "language": {
                                "url": '{{url("/assets/languages/Portuguese-Brasil.json")}}'}
                    } );;
            } );
        </script>
    </head>
    <body id="app-layout">
        <nav class="navbar navbar-default navbar-static-top">
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
                    <a class="navbar-brand" href="{{ url('/') }}">
                        Arduino Labs Controller
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        @if (!Auth::guest())
                            <li><a href="{{ url('/home') }}">Início</a></li>
                            <li><a href="{{ url('/computers') }}">Computadores</a></li>
                            <li><a href="{{ url('/configurations') }}">Configurações</a></li>
                            <li><a href="{{ url('/labs') }}">Laboratórios</a></li>
                            <li><a href="{{ url('/reles') }}">Relés</a></li>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Registrar-se</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

    </body>
</html>