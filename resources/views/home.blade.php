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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Home | UKM-crms</title>
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/extra-libs/prism/prism.css">
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
                                {{-- <img src="../assets/images/ukmkarier.png" alt="homepage" class="dark-logo" /> --}}
                                <!-- Light Logo icon -->
                                {{-- <img src="../assets/images/ukmkarier.png" alt="homepage" class="light-logo" /> --}}
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/jobs') }}" aria-haspopup="true" aria-expanded="false">Search Jobs</a>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
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
        
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            {{-- <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Carousal</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
                @include('inc.message')
                <div class="row">
                    <div class="col-lg-6">
                        <div class="jumbotron jumbotron-fluid" style="background-color: #fbf9fd">
                            <div class="container">
                              <div class="row">
                                <h1 class="display-4">Your future job is here.<br>
                                All in one place.</h1>

                                <p class="lead">A streamlined web app that helps UKM students to find jobs and internship opportunities & allows employers to hire fresh talents from UKM !</p>
                              </div>
                              <div class="row">
                                <form class="form-inline my-2 my-lg-0" type="get" action="{{ url('/jobs') }}">
                                    <div class="customize-input pr-2 my-2">
                                        <input type="title" name="title" value="" class="form-control custom-shadow custom-radius border-0 bg-white" placeholder="Search for Job Title" aria-label="" />
                                    </div>
                                    <div class="customize-input mx-2 my-2">
                                        <select class="form-control custom-select custom-shadow custom-radius border-0 bg-white mr-sm-2" name="type" id="type">
                                            <option value="" selected>Job Type | Choose...</option>
                                            @foreach ($types as $key => $value)
                                                <option value="{{ $key }}">
                                                    {{ $value}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="customize-input my-2"> 
                                        <select class="form-control custom-select custom-shadow custom-radius border-0 bg-white mr-sm-2" name="industry" id="industry">
                                            <option value="" selected>Industry | Choose...</option>
                                            @foreach ($industries as $key => $value)
                                                <option value="{{ $key }}">
                                                    {{ $value }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                        <button class="btn btn-light custom-radius border-0" type="submit"><i class="form-control-icon" data-feather="search"></i></button>
                                </form>
                              </div>
                              @if(Auth::guard('web')->guest() && Auth::guard('employer')->guest() && Auth::guard('admin')->guest())
                              <div class="row mt-4">
                                <h4 class="pt-2">New around here?</h4>
                                <div class="btn-group dropright ml-4">
                                    <button type="button" class="btn btn-primary btn-rounded dropdown-toggle"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Register as
                                    </button>
                                    <div class="dropdown-menu">
                                        <!-- Dropdown menu links -->
                                        <a class="dropdown-item" href="/register">Jobseeker</a>
                                        <a class="dropdown-item" href="/employer-register">Employer</a>
                                    </div>
                                </div>
                            </div>
                            @else
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div id="carouselExampleIndicators2" class="carousel slide"
                                data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="0"
                                        class="active"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <a href="/companies"><img class="img-fluid" src="../assets/images/big/img1.jpg"
                                            alt="First slide"></a>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="img-fluid" src="../assets/images/big/img2.jpg"
                                            alt="Second slide">
                                    </div>
                                    <div class="carousel-item">
                                        <a href="/jobs"><img class="img-fluid" src="../assets/images/big/img3.jpg"
                                            alt="Third slide"></a>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators2"
                                    role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators2"
                                    role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="text-dark text-center pb-2">Key Features</h3>
                        <div class="card">
                            <div class="card-body pb-0">
                                <div class="row">
                                    <div class="col-md-6 col-lg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 text-center" style="background-color:cornflowerblue">
                                                <h3 class="font-weight-medium text-white"><i style="width: 35px; height: 35px"
                                                    data-feather="layout" class="text-white mr-2"></i>Optimized Dashboard</h3>
                                                <h6 class="text-white mx-2">Assists jobseekers & employers in managing their applications & applicants while providing detailed insight.</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-warning text-center">
                                                <h3 class="font-weight-medium text-white"><i style="width: 35px; height: 35px"
                                                    data-feather="file-text" class="text-white mr-2"></i>Company Profiles</h3>
                                                <h6 class="text-white mx-4">Allows organizations that are associated with UKM-Karier to establish their online presence and reach out to candidates.</h6>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 text-center" style="background-color:hotpink">
                                                <h3 class="font-weight-medium text-white"><i style="width: 35px; height: 35px"
                                                    data-feather="database" class="text-white mr-2"></i>Talent Database</h3>
                                                <h6 class="text-white mx-4">Enables jobseekers to create personal profile, upload resume and get visible to potential employers.</h6>
                                            </div>
                                        </div> 
                                    </div>
                                    <div class="col-md-6 col-lg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h3 class="font-weight-medium text-white"><i style="width: 35px; height: 35px"
                                                    data-feather="briefcase" class="text-white mr-2"></i>Immediate Openings</h3>
                                                <h6 class="text-white mx-4">Provides opportunities for students & fresh graduates to gain valuable experience and build their career.</h6>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End row -->
                <div class="row">
                    <div class="col-lg-12 mt-2">
                        <h3 class="text-dark text-center pb-2">Jobs By Industry</h3>
                        <div class="row">
                        <div class="col-lg-2 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="mb-1 mt-1">
                                        <a href="/jobs?industry=1"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-calculator fa-3x"></i></button>
                                        <div class="mt-3 mb-0">Accounting/Finance</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-4 border-top mt-0">
                                    <div class="row justify-content-center">
                                        @if(count($posts->where('industry', '=', '1')) == 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '1')->count()}}</div>
                                        @elseif(count($posts->where('industry', '=', '1')) > 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '1')->count()}}</div>
                                        @else
                                        <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="mb-1 mt-1">
                                        <a href="/jobs?industry=2"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fab fa-black-tie fa-3x"></i></button>
                                        <div class="mt-3 mb-0">Admin/HR</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-4 border-top mt-0">
                                    <div class="row justify-content-center">
                                        @if(count($posts->where('industry', '=', '2')) == 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '2')->count()}}</div>
                                        @elseif(count($posts->where('industry', '=', '2')) > 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '2')->count()}}</div>
                                        @else
                                        <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="mb-1 mt-1">
                                        <a href="/jobs?industry=3"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-dollar-sign fa-3x"></i></button>
                                        <div class="mt-3 mb-0">Business</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-4 border-top mt-0">
                                    <div class="row justify-content-center">
                                        @if(count($posts->where('industry', '=', '3')) == 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '3')->count()}}</div>
                                        @elseif(count($posts->where('industry', '=', '3')) > 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '3')->count()}}</div>
                                        @else
                                        <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="mb-1 mt-1">
                                        <a href="/jobs?industry=4"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-university fa-3x"></i></button>
                                        <div class="mt-3 mb-0">Consultancy/Law</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-4 border-top mt-0">
                                    <div class="row justify-content-center">
                                        @if(count($posts->where('industry', '=', '4')) == 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '4')->count()}}</div>
                                        @elseif(count($posts->where('industry', '=', '4')) > 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '4')->count()}}</div>
                                        @else
                                        <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="mb-1 mt-1">
                                        <a href="/jobs?industry=5"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-chart-line fa-3x"></i></button>
                                        <div class="mt-3 mb-0">Economics</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-4 border-top mt-0">
                                    <div class="row justify-content-center">
                                        @if(count($posts->where('industry', '=', '5')) == 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '5')->count()}}</div>
                                        @elseif(count($posts->where('industry', '=', '5')) > 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '5')->count()}}</div>
                                        @else
                                        <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-sm-6">
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="mb-1 mt-1">
                                        <a href="/jobs?industry=6"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-cogs fa-3x"></i></button>
                                        <div class="mt-3 mb-0">Engineering</div>
                                        </a>
                                    </div>
                                </div>
                                <div class="p-4 border-top mt-0">
                                    <div class="row justify-content-center">
                                        @if(count($posts->where('industry', '=', '6')) == 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '6')->count()}}</div>
                                        @elseif(count($posts->where('industry', '=', '6')) > 1)
                                        <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                        <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '6')->count()}}</div>
                                        @else
                                        <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-sm-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-1 mt-1">
                                            <a href="/jobs?industry=7"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-first-aid fa-3x"></i></button>
                                            <div class="mt-3 mb-0">{{Str::limit('Healthcare/Hospitality', 20)}}</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-4 border-top mt-0">
                                        <div class="row justify-content-center">
                                            @if(count($posts->where('industry', '=', '7')) == 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '7')->count()}}</div>
                                            @elseif(count($posts->where('industry', '=', '7')) > 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '7')->count()}}</div>
                                            @else
                                            <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-1 mt-1">
                                            <a href="/jobs?industry=8"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-code-branch fa-3x"></i></button>
                                            <div class="mt-3 mb-0">IT/Computer</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-4 border-top mt-0">
                                        <div class="row justify-content-center">
                                            @if(count($posts->where('industry', '=', '8')) == 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '8')->count()}}</div>
                                            @elseif(count($posts->where('industry', '=', '8')) > 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '8')->count()}}</div>
                                            @else
                                            <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-1 mt-1">
                                            <a href="/jobs?industry=9"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-industry fa-3x"></i></button>
                                            <div class="mt-3 mb-0">Manufacturing</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-4 border-top mt-0">
                                        <div class="row justify-content-center">
                                            @if(count($posts->where('industry', '=', '9')) == 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '9')->count()}}</div>
                                            @elseif(count($posts->where('industry', '=', '9')) > 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '9')->count()}}</div>
                                            @else
                                            <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-1 mt-1">
                                            <a href="/jobs?industry=10"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-flask fa-3x"></i></button>
                                            <div class="mt-3 mb-0">Science</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-4 border-top mt-0">
                                        <div class="row justify-content-center">
                                            @if(count($posts->where('industry', '=', '10')) == 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '10')->count()}}</div>
                                            @elseif(count($posts->where('industry', '=', '10')) > 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '10')->count()}}</div>
                                            @else
                                            <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-1 mt-1">
                                            <a href="/jobs?industry=11"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-rss fa-3x"></i></button>
                                            <div class="mt-3 mb-0">Telecommunications</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-4 border-top mt-0">
                                        <div class="row justify-content-center">
                                            @if(count($posts->where('industry', '=', '11')) == 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '11')->count()}}</div>
                                            @elseif(count($posts->where('industry', '=', '11')) > 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '11')->count()}}</div>
                                            @else
                                            <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <div class="mb-1 mt-1">
                                            <a href="/jobs?industry=12"><button type="button" class="btn btn-primary btn-circle-lg" style="block-size: 100px; width: 100px"><i class="fa fa-ellipsis-h fa-3x"></i></button>
                                            <div class="mt-3 mb-0">Others</div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="p-4 border-top mt-0">
                                        <div class="row justify-content-center">
                                            @if(count($posts->where('industry', '=', '12')) == 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offer</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '12')->count()}}</div>
                                            @elseif(count($posts->where('industry', '=', '12')) > 1)
                                            <div class="link d-flex align-items-center justify-content-center font-weight-medium mr-2"><i class="mdi mdi-message font-20 mr-1"></i>Job Offers</div>
                                            <div class="badge badge-pill badge-success font-16 px-3">{{$posts->where('industry', '=', '12')->count()}}</div>
                                            @else
                                            <div class="badge badge-pill badge-light font-16">Not hiring</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Page Content -->
                <!-- ============================================================== -->
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
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="../assets/extra-libs/prism/prism.js"></script>
</body>

</html>

