<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Next Stage | Admin </title>

      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fontfaces CSS-->
    <link href="{{ asset('css.font-face.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-4.7/css/font-awesome.min.css') }} " rel="stylesheet" media="all">
    <link href="{{ asset('vendor/font-awesome-5/css/fontawesome-all.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/mdi-font/css/material-design-iconic-font.min.css') }}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset('vendor/bootstrap-4.1/bootstrap.min.css') }}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset('vendor/animsition/animsition.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/wow/animate.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/slick/slick.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet" media="all">
    <link href="{{ asset('vendor/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!--==================================   HEADER MOBILE ============================-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                       
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                       
                      
                      
                    </ul>
                </div>
            </nav>
        </header>
        <!--==================================  END HEADER MOBILE ============================-->


        <!-- ================================ HEADER DESKTOP ==================================-->
        <header class="header-desktop">
            <div class="section__content section__content--p30">
                <div class="container-fluid ">
                    <div class="header-wrap d-flex justify-content-end">
                      
                        <div id="app" class="row ">
                            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                                <div class="container ">

                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto">
                    
                                        </ul>
                    
                                        <ul class="navbar-nav ms-auto ">
                                            @guest
                                                @if (Route::has('login'))
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                                    </li>
                                                @endif
                    
                                              
                                            @else
                                                <li class="nav-item dropdown  ">
                                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                        {{ Auth::user()->email }}
                                                    </a>
                    
                                                    <div class="dropdown-menu dropdown-menu-right " aria-labelledby="navbarDropdown">
                                                
                    
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="text-center">
                                                            @csrf
                                                            <button type="submit">Logout  </button>
                                                        </form>
                                                    </div>
                                                </li>
                                            @endguest
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                    
                           
                        </div>
                                     
                                    </div>
                                </div>
                            
                                      
                                    </div>
                                  
                                
        </header>
        <!-- ==================================== END Header Desktop =================================== -->


        <!-- ===================================== MENU SIDEBAR ======================================== -->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
               
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
          
                        <li>
                            <a href="{{ route('companies.index') }}">
                                <i class="fas fa-map-marker-alt"></i>Manage Companies</a>
                        </li>
                        <li>
                            <a href="{{ route('employees.index') }}">
                                <i class="fas fa-map-marker-alt"></i>Manage Employees</a>
                        </li>
                       
                      
    
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- ======================================== END MENU SIDEBAR ============================= -->


