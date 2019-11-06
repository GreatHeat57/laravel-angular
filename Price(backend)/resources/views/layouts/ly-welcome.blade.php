<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Price Compare System for Vacations') }}</title> -->
    <title>{{ 'Price Compare System for Vacations' }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('theme_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('theme_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_assets/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('theme_assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('theme_assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('theme_assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('theme_assets/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('theme_assets/dist/js/demo.js') }}"></script>

    <!-- OPTIONAL SCRIPTS -->
    <script src="{{ asset('theme_assets/dist/js/demo.js') }}"></script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('theme_assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{ asset('theme_assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('theme_assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{ asset('theme_assets/plugins/jquery-mapael/maps/world_countries.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('theme_assets/plugins/chart.js/Chart.min.js')}}"></script>

    <!-- PAGE SCRIPTS -->

    <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 54px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item d-none d-sm-inline-block">
            <a href="{{url('/')}}" class="nav-link"><img class="img-response" style="width: 50%" src="{{asset('imgs/logo.png')}}"></a>
            </li>
          </ul>
      
          <!-- Right navbar links -->
          @if (Route::has('login'))
          <ul class="navbar-nav ml-auto">
            @auth
              <li class="nav-item">
                  <a class="nav-link" href="{{ url('/home') }}">Admin_Page</a>
              </li>

              <li class="nav-item dropdown">
                  <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>
                  
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                  </div>
              </li>

            @else
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">Login</a>
              </li>
            @if (Route::has('register'))
              <li class="nav-item">    
              <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
            @endif
            @endauth
          </ul>
          @endif 
        </nav>
        <!-- /.navbar -->
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin:0">
          <!-- Main content -->
          <section class="content">
            @yield('content')
          </section>
          <!-- /.content -->
        </div>
      </div>
</body>
<script>
    
</script>
</html>
