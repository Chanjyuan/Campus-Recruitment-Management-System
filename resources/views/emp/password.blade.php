<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/../assets/images/favicon.png">
    <title>Change Password | UKM-crms</title>
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
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
            style="background:url(/../assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box row">
                {{-- <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(/../assets/images/big/emp.png);">
                </div> --}}
                <div class="col-lg-12 col-md-12 bg-white">
                    <div class="p-3">
                        <h2 class="mt-3 text-center"><img class="pr-2" src="/../assets/images/big/pwd.png" style="width:12%" alt="wrapkit"> Change Password</h2>
                        {{-- <div class="text-center">
                            <img src="/../assets/images/big/icon.png" alt="wrapkit">
                        </div> --}}
                        @include('inc.message')
                        <form class="mt-4" method="POST" action="{{ route('emp.pwd.submit') }}">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6 mx-auto">
                                    <div class="form-group">
                                        <label class="text-dark" for="current_password">Current Password</label>
                                        <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password" required autocomplete="current_password" placeholder="Your Password" autofocus>

                                        @error('current_password')
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mx-auto">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">New Password</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="min. 8 characters" required autocomplete="password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mx-auto">
                                    <div class="form-group">
                                        <label class="text-dark" for="password-confirm">Confirm Password</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-6 mt-2 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Save Changes</button>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center">
                                <div class="col-lg-6 mt-4 text-center">
                                    @if(\Illuminate\Support\Facades\Auth::guard('admin')->check())
                                        <a class="float-left" href="{{ url('/admin-dashboard') }}">Dashboard</a>
                                    @elseif(\Illuminate\Support\Facades\Auth::guard('employer')->check())
                                        <a class="float-left" href="{{ url('/employer-dashboard') }}">Dashboard</a>
                                    @elseif(\Illuminate\Support\Facades\Auth::guard('web')->check())
                                        <a class="float-left" href="{{ url('/dashboard') }}">Dashboard</a>
                                    @endif
                                    <a href="/" class="text-dark float-right">Back To Home</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>

