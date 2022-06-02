<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>HoteLands</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
   
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.3/locale/es.min.js"></script>

</head>

<body>

    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background: #181818;">
            <div class="container">


                <!-- <img src="https://uploads.turbologo.com/uploads/design/hq_preview_image/3155482/draw_svg20210507-22909-ijuokh.svg.png" style="width:65px;" alt=""> -->
                <a class="navbar-brand" style="color:white;" href="{{ url('/') }}">
                    HoteLands.com
                </a>
          

                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest

                    <li class="nav-item">
                        <a class="nav-link" style="color:#fff ;" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" style="color:#fff ;" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                    @endif
                    @else


                    <a class="btn" style="color:white;" href="{{route('recepcionistas')}}">Recepcionistas</a>
                    <a class="btn" style="color:white;" href="{{route('clientes')}}">Clientes </a>
                    <a class="btn" style="color:white;" href="{{route('habitaciones')}}" > Habitaciones
                    <div class="dropdown">
                        </a>
                            <a class="btn dropdown-toggle" style="color:white;margin-left : -12%; ;" data-toggle="dropdown" aria-expanded="false">
                       Herramientas
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{route('tipos')}}">Tipos</a>
                            <a class="dropdown-item" href="{{route('temporada')}}">Temporadas</a>
                            <a class="dropdown-item" href="{{route('facturas.index')}}">Factura</a>
                            <a class="dropdown-item" href="{{route('reporte')}}">Reportes</a>

                        </div>
                    </div>

                    <li class="nav-item dropdown">
                        <a class="btn dropdown-toggle" style="color:white;" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            Perfil
                        </a>


                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Session') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
                <!-- </div> -->
            </div>
        </nav>
        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        @include('components.flash_alerts')
                     
                    </div>

                </div>

            </div>
            @yield('content')

        </main>
    </div>
</body>



</html>