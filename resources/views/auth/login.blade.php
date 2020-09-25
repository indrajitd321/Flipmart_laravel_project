<!doctype html>
<html lang="en" class="fixed accounts sign-in">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Log in Form</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/assets/admin/favicon/apple-icon-120x120.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('public/assets/admin/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/assets/admin/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/admin/favicon/favicon-16x16.png') }}">
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/animate.css/animate.css') }}">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/stylesheets/css/style.css') }}">
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo" > <a href="{{ route('index') }}"> <img src="{{ asset('public/assets/website/images/logo.png') }}"  alt="logo"> </a> </div>
        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control" id="email" placeholder="Email" required name="email">
                                <i class="fa fa-envelope"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
                                <i class="fa fa-key"></i>
                            </span>
                        </div>
                        <div class="form-group">
                            <div class="checkbox-custom checkbox-primary">
                                <input type="checkbox" id="remember-me" value="option1" checked>
                                <label class="check" for="remember-me">Remember me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Log In"  class="btn btn-primary btn-block">
                        </div>
                        <div class="form-group text-center">
                            <a href="#">Forgot password?</a>
                            <hr/>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="{{ asset('public/assets/adminvendor/jquery/jquery-1.12.3.min.js') }}"></script>
<script src="{{ asset('public/assets/adminvendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/adminvendor/nano-scroller/nano-scroller.js') }}"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="{{ asset('public/assets/adminjavascripts/template-script.min.js') }}"></script>
<script src="{{ asset('public/assets/adminjavascripts/template-init.min.js') }}"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>

</html>
