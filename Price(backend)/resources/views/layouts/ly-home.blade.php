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
    <!-- {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('custom_assets/family-Nunito.css') }}">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}


    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('theme_assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('theme_assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme_assets/plugins/sweetalert2/sweetalert2.min.css')}}">
    <link rel="stylesheet" href="{{asset('theme_assets/plugins/select2/dist/css/select2.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('theme_assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('custom_assets/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('custom_assets/over_layer_comp.css') }}">
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

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('theme_assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
    <script src="{{ asset('theme_assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ asset('theme_assets/plugins/jquery-mapael/jquery.mapael.min.js')}}"></script>
    <script src="{{ asset('theme_assets/plugins/jquery-mapael/maps/world_countries.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('theme_assets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- overlayerjs -->
    <script src="{{ asset('view_js/over_layer_comp.js')}}"></script>
    <script src="{{ asset('theme_assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{ asset('theme_assets/plugins/select2/dist/js/select2.min.js')}}"></script>

    <!-- PAGE SCRIPTS -->

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    {{-- <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="/imgs/logo.png" alt="" class="img-fluid" style="width:200px">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Sing Up') }}</a>
                                </li>
                            @endif  
                        @else
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div> --}}
    <div class="wrapper" id="app">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
          <!-- Left navbar links -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            @yield('navItems')
          </ul>
      
          <!-- Right navbar links -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              
            </li>
          </ul>
        </nav>
        <!-- /.navbar -->
      
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
          <!-- Brand Logo -->
          <a href="{{ url('/')}}" class="brand-link">
            <img src="{{ asset('theme_assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Price compare System</span>
          </a>
      
          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->

                  <li class="nav-item">
                    <a href="{{ url('/category-config/create') }}" class="nav-link @if($actFlag == 'categoryConf') active @endif">
                      <i class="fas fa-tools"></i>
                      <p>
                        Category Configration
                        <!-- <span class="right badge badge-danger">category</span> -->
                      </p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <!-- @if ($actFlag == 'feedConf') $actFlag = 'active' @endif -->
                    <a href="{{ url('/category-config') }}" class="nav-link @if($actFlag == 'categoryList') active @endif">
                      <i class="fas fa-stream"></i>
                      <p>
                        Category List
                        <!-- <span class="right badge badge-danger">category</span> -->
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <!-- @if ($actFlag == 'feedConf') $actFlag = 'active' @endif -->
                    <a href="{{ url('/feed-config/create') }}" class="nav-link @if($actFlag == 'feedConf') active @endif">
                      <i class="fas fa-cogs"></i>
                      <p>
                        Feed Configration
                        <!-- <span class="right badge badge-danger">feed</span> -->
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <!-- @if ($actFlag == 'feedConf') $actFlag = 'active' @endif -->
                    <a href="{{ url('/feed-config') }}" class="nav-link @if($actFlag == 'feedList') active @endif">
                      <i class="fas fa-list"></i>
                      <p>
                        Feed List
                        <!-- <span class="right badge badge-danger">feed</span> -->
                      </p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <!-- @if ($actFlag == 'feedConf') $actFlag = 'active' @endif -->
                    <a href="{{ url('/import-feeds') }}" class="nav-link @if($actFlag == 'importfeed') active @endif">
                      <i class="fas fa-file-import"></i>
                      <p>
                        Import Feeds
                        <!-- <span class="right badge badge-danger">feed</span> -->
                      </p>
                    </a>
                  </li>

                </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>
      
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Main content -->
          <section class="content">
            @yield('content')
          </section>
          <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
      
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
          <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
      
        <!-- Main Footer -->
        <footer class="main-footer">
          <strong>Copyright &copy; 2019 <a href="#">Price Compare System for vacation</a>.</strong>
          All rights reserved.
          <div class="float-right d-none d-sm-inline-block">
            <!-- <b>Version</b> 3.0.0-rc.1 -->
          </div>
        </footer>
      </div>
</body>
<script>
    
</script>
</html>
