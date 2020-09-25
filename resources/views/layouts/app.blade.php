<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>Admin</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('public/assets/admin/favicon/apple-icon-120x120.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('public/assets/admin/favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/assets/admin/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/assets/admin/favicon/favicon-16x16.png') }}">
    <!--load progress bar-->
    <script src="{{ asset('public/assets/admin/vendor/pace/pace.min.js') }}"></script>
    <link href="{{ asset('public/assets/admin/vendor/pace/pace-theme-minimal.css') }}" rel="stylesheet" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/animate.css/animate.css') }}">
    <!--SECTION css-->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/data-table/media/css/dataTables.bootstrap.min.css') }}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <!-- ========================================================= -->
    <!--Notification msj-->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/toastr/toastr.min.css') }}">
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/vendor/magnific-popup/magnific-popup.css') }}">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('public/assets/admin/stylesheets/css/style.css') }}">


</head>

<body>
    <div class="wrap">
        <!-- page HEADER -->
        <!-- ========================================================= -->
        <div class="page-header">
            <!-- LEFTSIDE header -->
            <div class="leftside-header">
                <div class="logo">
                    <a href="{{ route('index') }}" class="on-click">
                     <img src="{{ asset('public/assets/website/images/logo.png') }}" alt="logo"> 
                    </a>
                </div>
                <div id="menu-toggle" class="visible-xs toggle-left-sidebar" data-toggle-class="left-sidebar-open" data-target="html">
                    <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
                </div>
            </div>
            <!-- RIGHTSIDE header -->
            <div class="rightside-header">
                <div class="header-middle"></div>
                <!--SEARCH HEADERBOX-->
                <div class="header-section" id="search-headerbox">
                    <input type="text" name="search" id="search" placeholder="Search...">
                    <i class="fa fa-search search" id="search-icon" aria-hidden="true"></i>
                    <div class="header-separator"></div>
                </div>

                <!--USER HEADERBOX -->
                <div class="header-section" id="user-headerbox">
                    <div class="user-header-wrap">
                        <div class="user-photo">
                            <img alt="profile photo" src="{{ asset('public/assets/admin/images/avatar/avatar_user.jpg') }}" />
                        </div>
                        <div class="user-info">
                            <span class="user-name">{{ (Auth::User()->name ) }}</span>
                            <span class="user-profile">Admin</span>
                        </div>
                        <i class="fa fa-plus icon-open" aria-hidden="true"></i>
                        <i class="fa fa-minus icon-close" aria-hidden="true"></i>
                    </div>
                    <div class="user-options dropdown-box">
                        <div class="drop-content basic">
                            <ul>
                                <li> <a href="#"><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="header-separator"></div>
                <!--Log out -->
                <div class="header-section">
                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="left" title="Logout"><i class="fa fa-sign-out log-out" aria-hidden="true"></i></a>
                                                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
    
            </div>
            </div>
        </div>
        <!-- page BODY -->
        <!-- ========================================================= -->
        <div class="page-body">
            <!-- LEFT SIDEBAR -->
            <!-- ========================================================= -->
            <div class="left-sidebar">
                <!-- left sidebar HEADER -->
                <div class="left-sidebar-header">
                    <div class="left-sidebar-title">Navigation</div>
                    <div class="left-sidebar-toggle c-hamburger c-hamburger--htla hidden-xs" data-toggle-class="left-sidebar-collapsed" data-target="html">
                        <span></span>
                    </div>
                </div>
                <!-- NAVIGATION -->
                <!-- ========================================================= -->
                <div id="left-nav" class="nano">
                    <div class="nano-content">
                        <nav>
                            <ul class="nav nav-left-lines" id="main-nav">
                                <!--HOME-->
                                <li class="{{ request()->is('dashboard') ? 'active-item' : ''}}"><a href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i><span>Dashboard</span></a></li>

                                <!--Brands-->
                                <li class="has-child-item close-item {{ request()->is('brand/*') ? 'open-item' : ''}}">
                                    <a><i class="fa fa-list" aria-hidden="true"></i><span>Brands</span> </a>
                                    <ul class="nav child-nav level-1">
                                    <li class="{{ request()->is('brand/manage-brand') ? 'open-item' : ''}}"><a href="{{ route('manage-brand') }}">All Brands</a></li>
                                        <li class="{{ request()->is('brand/add-brand','brand/edit/*') ? 'open-item' : ''}}"><a href="{{ route('add-brand') }}">Add Brands</a></li>
                
                                    </ul>
                                </li>
                                  <!--categories-->
                                  <li class="has-child-item close-item {{ request()->is('category/*') ? 'open-item' : ''}}">
                                    <a><i class="fa fa-list" aria-hidden="true"></i><span>Categories</span> </a>
                                    <ul class="nav child-nav level-1">
                                          <li class="{{ request()->is('category/manage-category') ? 'open-item' : ''}}"><a href="{{ route('manage-category') }}">All Categories</a></li>
                                        <li class="{{ request()->is('category/manage-sub-category','category/add-sub-category') ? 'open-item' : ''}}"><a href="{{ route('manage-sub-category') }}">All Sub-Categories</a></li>

                                    </ul>
                                </li>
                             </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- CONTENT -->
            <!-- ========================================================= -->
            <div class="content">
                <!-- content HEADER -->
                <!-- ========================================================= -->
              @yield('content')    
                
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
            </div>
 
            <!--scroll to top-->
            <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
        </div>
    </div>
    <!--BASIC scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('public/assets/admin/vendor/jquery/jquery-1.12.3.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="{{ asset('public/assets/admin/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
    <script src="{{ asset('public/assets/admin/vendor/nano-scroller/nano-scroller.js') }}"></script>
    <!--TEMPLATE scripts-->
    <!-- ========================================================= -->
    <script src="{{ asset('public/assets/admin/javascripts/template-script.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/javascripts/template-init.min.js') }}"></script>
    <!-- SECTION script and examples-->
    <!-- ========================================================= -->
    <!--morris chart-->
    <script src="{{ asset('public/assets/admin/vendor/chart-js/chart.min.js') }}"></script>
    <!--Gallery with Magnific popup-->
    <script src="{{ asset('public/assets/admin/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendor/data-table/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/assets/admin/vendor/data-table/media/js/dataTables.bootstrap.min.js') }}"></script>
    <!--Examples-->
    <script src="{{ asset('public/assets/admin/javascripts/examples/tables/data-tables.js') }}"></script>
    <!--Examples-->
    <script src="{{ asset('public/assets/admin/javascripts/examples/dashboard.js') }}"></script>
    <script src="{{ asset('public/assets/admin/javascripts/examples/script.js') }}"></script>
    

</body>

</html>