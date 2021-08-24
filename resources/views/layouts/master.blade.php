<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/../assets/images/favicon.png">
    <title>@yield('title')</title>
    <!-- Custom CSS -->
    <link href="/../dist/css/style.min.css" rel="stylesheet">
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="/../assets/extra-libs/prism/prism.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="horizontal" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="/">
                            <b class="logo-icon">
                                UKM | CRMS
                                <!-- Dark Logo icon -->
                                {{-- <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" /> --}}
                                <!-- Light Logo icon -->
                                {{-- <img src="../assets/images/logo-icon.png" alt="homepage" class="light-logo" /> --}}
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                {{-- <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" /> --}}
                                <!-- Light Logo text -->
                                {{-- <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> --}}
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" style="background-color: white">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">Articles</a>
                        </li> --}}
                        <li class="nav-item {{'companies' == request()->path() ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/companies') }}" aria-haspopup="true" aria-expanded="false">Company Profiles</a>
                        </li>
                        <li class="nav-item {{'jobs' == request()->path() ? 'active' : ''}}">
                            <a class="nav-link " href="{{ url('/jobs') }}" aria-haspopup="true" aria-expanded="false">Search Jobs</a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        {{-- <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white"
                                            type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li> --}}
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item">
                            @if (Route::has('login'))
                            @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                            <a class="nav-link" href="{{ url('/admin-dashboard') }}" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                            @elseif(\Illuminate\Support\Facades\Auth::guard('employer')->check())
                                <a class="nav-link" href="{{ url('/employer-dashboard') }}" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                                @elseif(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                <a class="nav-link" href="{{ url('/dashboard') }}" aria-haspopup="true" aria-expanded="false">Dashboard</a>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <span class="ml-2">
                                    <span>Welcome,</span> 
                                        <span class="text-dark">Login as</span><i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Jobseeker') }}</a>
                                    <a class="dropdown-item" href="{{ route('employer.login') }}">{{ __('Employer') }}</a>
                                @endif
                            </li>
                            {{-- <a class="nav-link" href="{{ route('login') }}"
                                aria-haspopup="true" aria-expanded="false">
                                    <span class="ml-2"><span>Welcome,</span> <span
                                            class="text-dark">Login now!</span></span>
                                @endif
                            </a> --}}
                            @endif
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->

        <div class="page-wrapper-off">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="content">
                @yield('content')
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted position-relative">
                All Rights Reserved by UKM-crms. Designed and Developed by UKM-crms.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="/../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="/../dist/js/app-style-switcher.js"></script>
    <script src="/../dist/js/feather.min.js"></script>
    <script src="/../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="/../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="/../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="/../assets/extra-libs/c3/d3.min.js"></script>
    <script src="/../assets/extra-libs/c3/c3.min.js"></script>
    <script src="/../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="/../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="/../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="/../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/../dist/js/pages/dashboards/dashboard1.min.js"></script>

    @yield('scripts')
</body>

</html>