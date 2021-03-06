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
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            @if($notification->type == 'App\Notifications\ApplicationSent')
                                            <a href="/profile/{{$notification->data['applyby']['id']}}"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-info rounded-circle btn-circle"><i
                                                        data-feather="user" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">New Application Added</h6>
                                                    <span class="font-12 text-nowrap d-block text-dark">{{$notification->data['applyby']['name']}} has applied for position of {{$notification->data['post']['title']}}</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['jobapp']['created_at']))}}</span>
                                                </div>
                                            </a>
                                            @elseif($notification->type == 'App\Notifications\PostDeactivated')
                                            <a href="/posts/{{$notification->data['post']['id']}}"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-warning rounded-circle btn-circle"><i
                                                        data-feather="alert-circle" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Job Post Deactivated</h6>
                                                    <span class="font-12 text-nowrap d-block text-dark">The job posting of 
                                                    {{$notification->data['post']['title']}} has been deactivated by the admin, please review/update your job posting or contact ukm-karier@ukm.edu.my.</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['post']['updated_at']))}}</span>
                                                </div>
                                            </a>
                                            @else
                                            <a href="/posts/{{$notification->data['post']['id']}}"
                                                class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-success rounded-circle btn-circle"><i
                                                        data-feather="check-circle" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Job Post Reactivated</h6>
                                                    <span class="font-12 text-nowrap d-block text-dark">The job posting of 
                                                    {{$notification->data['post']['title']}} has been activated by the admin and will reappear on the listing.</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{date('d-m-Y, H:i', strtotime($notification->data['post']['updated_at']))}}</span>
                                                </div>
                                            </a>
                                            @endif
                                        </div>
                                    @endforeach
                                    </li>
                                    <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="/notifications">
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
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <img src="/storage/company_logo/{{ Auth::user()->logo }}" alt="image" class="rounded-circle border border-light"
                                    width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                        class="text-dark">{{ Auth::user()->name }}</span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="/company-profile/{{Auth::user()->id}}"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Company Profile</a>
                                @if(\Illuminate\Support\Facades\Auth::guard('employer')->check())
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('employer.logout') }}" onclick="event.preventDefault();
                                document.getElementById('employer-logout-form').submit();"><i data-feather="power"
                                        class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                                    <form id="employer-logout-form" action="{{ route('employer.logout') }}" method="POST"
                                    style="display: none;">
                                  @csrf
                                @endif
                              </form>
                                {{-- <div class="dropdown-divider"></div>
                                <div class="pl-4 p-3"><a href="javascript:void(0)" class="btn btn-sm btn-info">View
                                        Profile</a></div> --}}
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
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/employer-dashboard"
                                aria-expanded="false"><i data-feather="layout" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Actions</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link" href="/company-profile-edit/{{Auth::user()->id}}"
                            aria-expanded="false"><i class="fas fa-address-book"></i><span
                                class="hide-menu">Edit Profile
                            </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="/posts/create"
                                aria-expanded="false"><i data-feather="file-plus" class="feather-icon"></i><span
                                    class="hide-menu">Post Job
                                </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="/posted-jobs/{{Auth::user()->id}}"
                            aria-expanded="false"><i class="fas fa-briefcase"></i><span
                                class="hide-menu">Posted Jobs
                            </span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link" href="/job-applications/{{Auth::user()->id}}"
                            aria-expanded="false"><i class="fas fa-users"></i><span
                                class="hide-menu">Job Applicants
                            </span></a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Authentication</span></li>

                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="/changepassword"
                                aria-expanded="false"><i data-feather="lock" class="feather-icon"></i><span
                                    class="hide-menu">Change Password
                                </span></a>
                        </li>
                        <li class="sidebar-item"> 
                            @if(\Illuminate\Support\Facades\Auth::guard('employer')->check())
                            <a class="sidebar-link sidebar-link" href="{{ route('employer.logout') }}" onclick="event.preventDefault();
                            document.getElementById('employer-logout-form').submit();" aria-expanded="false"><i data-feather="log-out"
                                    class="feather-icon"></i><span class="hide-menu">Logout
                                </span></a>
                                <form id="employer-logout-form" action="{{ route('employer.logout') }}" method="POST"
                                style="display: none;">
                              @csrf
                            @endif
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
    <script src="{{ asset('ckeditor/ckeditor.js')}}"></script>
    <script>CKEDITOR.replace('article-ckeditor');</script>
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