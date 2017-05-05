<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Rosterfi | {{ $pageTitle }}</title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/morrisjs/morris.css" rel="stylesheet">
    <link href="/vendor/jquery-jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet">
    <link href="/css/adminnine.css" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = <?php echo json_encode(['csrfToken' => csrf_token(),]); ?>
    </script>
</head>
<body>

<div id="wrapper">
    <div class="navbar-default sidebar">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="/">Rosterfi</a></div>
        <div class="clearfix"></div>
        <div class="sidebar-nav navbar-collapse">

            <!-- user profile pic -->
            <div class="userprofile text-center">
                <div class="userpic"><img src="@if(Auth::user()->profile_image) /userimages/{{Auth::user()->profile_image}} @else /img/default_profile.png @endif" alt="" class="userpicimg">
                    <a href="/account/settings" class="btn btn-primary settingbtn"><i class="fa fa-gear"></i></a></div>
                <h3 class="username">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
            </div>
            <div class="clearfix"></div>

            <ul class="nav" id="side-menu">
                <li><a href="/dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
                <li><a href="javascript:void(0)" class="menudropdown"><i class="fa fa-cubes"></i> Clubs
                        <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="#">Find Clubs</a></li>
                        <li><a href="#">My Clubs</a></li>
                        <li><a href="#">Create Club</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div id="page-wrapper">
        <div class="row">
            <nav class="navbar navbar-default navbar-static-top" style="margin-bottom: 0">
                <button class="menubtn pull-left btn "><i class="glyphicon  glyphicon-th"></i></button>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)">
                            <i class="fa fa-bell fa-fw"></i> <span class="count">1</span> </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li>
                                <a href="javascript:void(0)">
                                    <div>
                                        Membership expiring for Southern Shooting Center!
                                        <br>
                                        <span class="pull-right text-muted small">4 minutes ago</span></div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-alerts -->
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle userdd" data-toggle="dropdown" href="javascript:void(0)">
                            <div class="userprofile small ">
                                <span class="userpic"> <img src="@if(Auth::user()->profile_image) /userimages/{{Auth::user()->profile_image}} @else /img/default_profile.png @endif" alt="" class="userpicimg"> </span>
                                <div class="textcontainer">
                                    <h3 class="username">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h3>
                                    <p>Member</p>
                                </div>
                            </div>
                            <i class="caret"></i> </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="/account/settings"><i class="fa fa-gear fa-fw"></i> Account</a></li>
                            <li>
                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        @yield('content')
    </div>
</div>


<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="/vendor/datatables-responsive/dataTables.responsive.js"></script>

<script src="/js/adminnine.js"></script>
<script>
    $(document).ready(function () {
        var toastType = "{{ session('toast-type') }}";
        var toastTitle = "{{ session('toast-title') }}";
        var toastMessage = "{{ session('toast-message') }}";

        if((toastType && toastType != '') &&
                (toastTitle && toastTitle != '') &&
                (toastMessage && toastMessage != ''))
        {
            setTimeout(function(){
                $('body').append('<div class="alert alert-'+toastType+' toastupdates alert-dismissable"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> <strong>'+toastTitle+'</strong><p>'+toastMessage+'</p></div>');

                setTimeout(function(){
                    $('.toastupdates').addClass("active");
                },1000);
            },2000);
        }
    });
</script>
</body>
</html>

