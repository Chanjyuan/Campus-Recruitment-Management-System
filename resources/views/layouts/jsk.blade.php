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
    <link href="/../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="/../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="/../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="/../dist/css/style.min.css" rel="stylesheet">
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
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
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
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                                id="bell" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                @if(auth()->user()->unreadNotifications->count())
                                <span class="badge badge-primary notify-no rounded-circle">
                                    {{ auth()->user()->unreadNotifications->count() }}
                                </span>
                                @else
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            @if($notification->data['jobapp']['status'] == 'Shortlisted')
                                            <a href="#"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-success rounded-circle btn-circle"><i
                                                        data-feather="check-circle"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Shortlisted for Interview</h6>
                                                    <span class="font-12 text-nowrap d-block text-dark">{{$notification->data['replyby']['company_name']}} has responded to your application for the position of {{$notification->data['post']['title']}} and shall contact you shortly</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['jobapp']['updated_at']))}}</span>
                                                </div>
                                            </a>
                                            @else
                                            <a href="#"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i
                                                        data-feather="x-circle"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Application Status Updated</h6>
                                                    <span class="font-12 text-nowrap d-block text-dark">{{$notification->data['replyby']['company_name']}} has decided to move forward with another applicant for the position of {{$notification->data['post']['title']}}</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['jobapp']['updated_at']))}}</span>
                                                </div>
                                            </a>
                                            @endif
                                        </div>
                                    @endforeach
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="/all-notifications">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                                @if (!(auth()->user()->unreadNotifications->count()))
                                <ul class="list-style-none">
                                  <li>
                                    <div class="message-center notifications position-relative">
                                        <a class="message-item d-flex align-items-center border-bottom px-3 py-2" href="#">
                                            <span class="font-14 text-nowrap d-block text-dark">
                                                There is no notification at the moment.
                                            </span>
                                        </a>
                                    </div>
                                  </li>
                                </ul>
                                @endif
                            </div>
                        </li>
                        <!-- End Notification -->
                        <!-- ============================================================== -->
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="/storage/uploads/{{ Auth::user()->profile->image }}" alt="user" class="rounded-circle border border-light"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{ Auth::user()->name }}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="/profile/{{Auth::user()->id}}"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('user.logout') }}" onclick="event.preventDefault();
                                document.getElementById('user-logout-form').submit();"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                    <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                                    style="display: none;">
                                  @csrf
                              </form>
                            </div>
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
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/dashboard"
                                aria-expanded="false"><i data-feather="layout" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Actions</span></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link" href="/profile-edit/{{Auth::user()->id}}"
                            aria-expanded="false"><i data-feather="edit" class="feather-icon"></i><span
                                class="hide-menu">Update Profile
                            </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="{{ url('/jobs') }}"
                                aria-expanded="false"><i data-feather="search" class="feather-icon"></i><span
                                    class="hide-menu">Search Jobs
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="/saved-jobs/{{Auth::user()->id}}"
                            aria-expanded="false"><i data-feather="bookmark" class="feather-icon"></i><span
                                class="hide-menu">Saved Jobs
                            </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="/my-applications/{{Auth::user()->id}}"
                            aria-expanded="false"><i class="fas fa-clipboard-list"></i><span
                                class="hide-menu">My Applications
                            </span></a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/change-password"
                                aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                                    class="hide-menu">Change Password
                                </span></a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link sidebar-link" href="{{ route('user.logout') }}" onclick="event.preventDefault();
                            document.getElementById('user-logout-form').submit();" aria-expanded="false"><i data-feather="log-out"
                                    class="feather-icon"></i><span class="hide-menu">Logout
                                </span></a>
                                <form id="user-logout-form" action="{{ route('user.logout') }}" method="POST"
                                style="display: none;">
                              @csrf
                          </form>
                        </li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
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
            <footer class="footer text-center text-muted">
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
    <script src="/../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/../dist/js/pages/datatable/datatable-basic.init.js"></script>

    @yield('scripts')
</body>

</html>