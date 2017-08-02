<!DOCTYPE html>

<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Rosterfi</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{url('/assets/global/css/components-md.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{url('/assets/global/css/plugins-md.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{url('/assets/layouts/layout3/css/layout.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/layouts/layout3/css/themes/default.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{url('/assets/layouts/layout3/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    {{--<link rel="shortcut icon" href="favicon.ico" /> </head>--}}
    <link rel="icon" type="image/png" sizes="16x16" href="/img/membership/membership2.png">

    <!-- Custom Assets -->
    @stack('asset')
<!-- END HEAD -->

<body class="page-container-bg-solid page-header-menu-fixed page-boxed page-md">
<!-- BEGIN HEADER -->
<div class="page-header">
    <!-- BEGIN HEADER TOP -->
    <div class="page-header-top">
        <div class="container">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="/">
                    <img src="/img/membership/membership3.png" alt="logo" class="logo-default">
                </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler"></a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">

                    @if(Auth::guest())
                        <!-- BEGIN LOGIN DROPDOWN -->
                        <li class="" id="header_notification_bar">
                            <a href="/login">
                                <span class="badge badge-info">Login</span>
                            </a>
                        </li>
                        <!-- END LOGIN DROPDOWN -->


                        <li class="">
                            <span class="separator"></span>
                        </li>

                        <!-- BEGIN REGISTER DROPDOWN -->
                        <li class="" id="header_task_bar">
                            <a href="/register">
                                <span class="badge badge-danger">SignUp</span>
                            </a>
                        </li>
                        <!-- END REGISTER DROPDOWN -->
                    @endif


                    @if(Auth::check())
                        <!-- BEGIN USER LOGIN DROPDOWN -->
                        <li class="dropdown dropdown-user dropdown-dark">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <img alt="" class="img-circle" src="/assets/layouts/layout3/img/avatar9.jpg">
                                <span class="username username-hide-mobile">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
                                <li>
                                    <a href="{{url('/myaccount')}}">
                                        <i class="icon-user"></i> My Account
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-calendar"></i> My Calendar
                                    </a>
                                </li>
                                <li class="divider"> </li>

                                <li>
                                    <a href="{{url('/logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="icon-key"></i> Log Out
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        <!-- END USER LOGIN DROPDOWN -->
                        <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                        <li class="dropdown dropdown-extended quick-sidebar-toggler">
                            <span class="sr-only">Toggle Quick Sidebar</span>
                            <i class="icon-logout"></i>
                        </li>
                        <!-- END QUICK SIDEBAR TOGGLER -->
                    @endif

                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- END HEADER TOP -->

    <!-- BEGIN HEADER MENU -->
    <div class="page-header-menu">
        <div class="container">
            <!-- BEGIN HEADER SEARCH BOX -->
            <form class="search-form" action="page_general_search.html" method="GET">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="query">
                    <span class="input-group-btn">
                        <a href="javascript:;" class="btn submit">
                            <i class="icon-magnifier"></i>
                        </a>
                    </span>
                </div>
            </form>
            <!-- END HEADER SEARCH BOX -->
            <!-- BEGIN MEGA MENU -->
            <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
            <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
            <div class="hor-menu  ">
                <ul class="nav navbar-nav">
                    <li class="menu-dropdown classic-menu-dropdown <?php if ($page == "home") echo 'active'; ?>">
                        <a href="{{url('/home')}}"> Home
                            <span class="arrow"></span>
                        </a>
                    </li>

                    <li class="<?php if ($page == "aboutus") echo 'active'; ?>">
                        <a href="#"> About Us
                            <span class="arrow"></span>
                        </a>
                    </li>

                    <li class="menu-dropdown classic-menu-dropdown <?php if ($page == "allClubs") echo 'active'; ?>">
                        <a href="javascript:;"> Clubs
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li>
                                <a href="{{url('club/all-clubs')}}"> All Clubs </a>
                            </li>
                            @if(Auth::check())
                            <li>
                                <a href="{{url('club/my-clubs')}}"> Your Clubs </a>
                            </li>
                            @endif
                        </ul>
                    </li>

                    <li class="menu-dropdown classic-menu-dropdown <?php if ($page == "myevents") echo 'active'; ?>">
                        <a href="javascript:;"> Events
                            <span class="arrow"></span>
                        </a>
                        <ul class="dropdown-menu pull-left">
                            <li class=" ">
                                <a href="{{url('event/all-events')}}"> All Events </a>
                            </li>
                            @if(Auth::check())
                                <li class=" ">
                                    <a href="{{url('event/my-events')}}"> Your Events </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- END MEGA MENU -->
        </div>
    </div>
    <!-- END HEADER MENU -->
</div>
<!-- END HEADER -->

@yield('content')

<!-- BEGIN FOOTER -->
<!-- BEGIN PRE-FOOTER -->
<div class="page-prefooter">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                <h2>About</h2>
                <p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam dolore. </p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs12 footer-block">
                <h2>Subscribe Email</h2>
                <div class="subscribe-form">
                    <form action="javascript:;">
                        <div class="input-group">
                            <input type="text" placeholder="mail@email.com" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn" type="submit">Submit</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                <h2>Follow Us On</h2>
                <ul class="social-icons">

                    <li>
                        <a href="javascript:;" data-original-title="facebook" class="facebook"></a>
                    </li>
                    <li>
                        <a href="javascript:;" data-original-title="twitter" class="twitter"></a>
                    </li>
                    <li>
                        <a href="javascript:;" data-original-title="googleplus" class="googleplus"></a>
                    </li>
                    <li>
                        <a href="javascript:;" data-original-title="linkedin" class="linkedin"></a>
                    </li>

                </ul>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 footer-block">
                <h2>Contacts</h2>
                <address class="margin-bottom-40"> Phone: 1 800 123 3456
                    <br> Email:
                    <a href="mailto:info@rosterfi.com">info@rosterfi.com</a>
                </address>
            </div>
        </div>
    </div>
</div>
<!-- END PRE-FOOTER -->
<!-- BEGIN INNER FOOTER -->
<div class="page-footer">
    <div class="container"> 2017 &copy; Rosterfi by Paulo Sousa.
    </div>
</div>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<!-- END INNER FOOTER -->
<!-- END FOOTER -->
<!--[if lt IE 9]>
<script src="{{url('/assets/global/plugins/respond.min.js')}}"></script>
<script src="{{url('/assets/global/plugins/excanvas.min.js')}}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{url('/assets/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
<script src="{{url('/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{url('/assets/global/scripts/app.min.js')}}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- Custom Scripts -->
<script src="{{url('/assets/global/scripts/custom.js')}}" type="text/javascript"></script>
@stack('script')
</body>
</html>