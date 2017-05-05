<?php $__env->startSection('title'); ?>
    Your clubs
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="/dash_assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="/dash_assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="/dash_assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="/dash_assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
<script src="/dash_assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/dash_assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/dash_assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/dash_assets/apps/scripts/calendar.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- END PAGE LEVEL PLUGINS -->
<style type="text/css">
    .imagebox_footer {
        bottom: 0px;
        width: 100%;
        text-align: center;
        padding: 12px;
        color:white;
    }

    .admin {
        background: rgba(0,0,0,0.85);
    }

    .member {
        background: rgba(0,0,0,0.7);
    }

    .invited {
        background: rgba(0,0,0,0.5);
    }

    .invite-accept {
        position: absolute;
        right: -5px;
        bottom: 0px;
        vertical-align: middle;
        padding: 5px 20px;
        background: darkmagenta;
        text-decoration: none;
    }

    .eventcontainer {
        border-left: 5px solid #afe;
        background: honeydew;
        padding: 4px;
        margin-bottom: 5px;
    }

    .monthdate {
        font-weight: 900;
        color: #f3565d;
        text-align: center;
    }

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-container" style="background: #eef1f5;">
        <div class="container">
            <div class="row">
                <div class="main col-md-12">
                    <h1 class="page-title text-center">Your Clubs</h1>
                    <!-- section start -->
                    <!-- ================ -->
                    <section class="pv-30 clearfix">

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="image-box style-2 mb-20 bordered shadow text-center light-gray-bg">

                                        <div class="overlay-container overlay-visible">
                                            <img src="/img/gallery5.jpg" alt="">
                                            <div class="overlay-bottom text-left">
                                                <p class="lead margin-clear">ToastMasters</p>
                                            </div>
                                        </div>
                                        <div class="body row">
                                            <div class="col-sm-6">
                                                <h5>Joined</h5>
                                                <span class="small mb-10 text-muted"><i class="icon-calendar"></i> March 17, 2012</span>
                                            </div>
                                            <div class="col-sm-6" style="float: right">
                                                <h5>Expires</h5>
                                                <span class="small mb-10 text-muted"><i class="icon-calendar"></i> Apr 15, 2018</span>
                                            </div>

                                        </div>
                                        <div class="imagebox_footer admin">
                                            <span class="lead margin-clear">Administrator</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="image-box style-2 mb-20 bordered shadow light-gray-bg">

                                        <div class="overlay-container overlay-visible">
                                            <img src="/img/gallery6.jpg" alt="">
                                            <div class="overlay-bottom text-left">
                                                <p class="lead margin-clear">South Louisiana IDPA</p>
                                            </div>
                                        </div>
                                        <div class="body row">
                                            <div class="col-sm-6">
                                                <h5>Joined</h5>
                                                <span class="small mb-10 text-muted"><i class="icon-calendar"></i> May 18, 2012</span>
                                            </div>
                                            <div class="col-sm-6" style="float: right">
                                                <h5>Expires</h5>
                                                <span class="small mb-10 text-muted"><i class="icon-calendar"></i> May 18, 2017</span>
                                            </div>

                                        </div>
                                        <div class="imagebox_footer member">
                                            <span class="lead margin-clear">Member</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="image-box style-2 mb-20 bordered shadow light-gray-bg">

                                        <div class="overlay-container overlay-visible">
                                            <img src="/img/gallery8.jpg" alt="">
                                            <div class="overlay-bottom text-left">
                                                <p class="lead margin-clear">Southern Shooting Center</p>
                                            </div>
                                        </div>
                                        <div class="body row">
                                            <div class="col-sm-6">
                                                <h5>Joined</h5>
                                                <span class="small mb-10 text-muted"><i class="icon-calendar"></i> Apr 14, 2016</span>
                                            </div>
                                            <div class="col-sm-6" style="float: right">
                                                <h5>Expires</h5>
                                                <span class="small mb-10 text-muted"><i class="icon-calendar"></i> Label</span>
                                            </div>

                                        </div>
                                        <div class="imagebox_footer invited">
                                            <span class="lead margin-clear">Invited</span>
                                            <span class="invite-accept"><a href="#">Accept</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </section>
                    <!-- section end -->


                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- BEGIN PORTLET-->
                <div class="portlet light portlet-fit  calendar">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-green"></i>
                            <span class="caption-subject font-blue sbold uppercase">Calendar</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div id="calendar" class="has-toolbar"> </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>

            <div class="col-md-4">
                <div class="portlet light portlet-fit">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class=" icon-layers font-blue"></i>
                            <span class="caption-subject font-blue sbold uppercase">Events</span>
                        </div>
                    </div>

                    <div class="portlet-body">
                        <div class="row eventcontainer">
                            <div class="col-md-3 text-center monthdate">
                                <span class="month">May</span>
                                <span class="date">12th</span>
                            </div>
                            <div class="col-md-9">
                                <span class="small mb-10 text-muted">South Louisiana IDPA</span>
                                <h6 class="title">Club Match</h6>
                            </div>
                        </div>

                        <div class="row eventcontainer">
                            <div class="col-md-3 text-center monthdate">
                                <span class="month">May</span>
                                <span class="date">15th</span>
                            </div>
                            <div class="col-md-9">
                                <span class="small mb-10 text-muted">South Louisiana IDPA</span>
                                <h6 class="title">Club Membership Expiration</h6>
                            </div>
                        </div>

                        <div class="row eventcontainer">
                            <div class="col-md-3 text-center monthdate">
                                <span class="month">May</span>
                                <span class="date">17th</span>
                            </div>
                            <div class="col-md-9">
                                <span class="small mb-10 text-muted">ToastMasters</span>
                                <h6 class="title">Monthly Meeting</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Portlet -->
            </div>
        </div>
    </div>

    <!-- section start -->
    <!-- ================ -->
    <section class="pv-30 clearfix" style="background: #eef1f5;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="page-title text-center">Other Clubs you may be interested in</h1>
                    <div class="separator"></div>
                </div>

            </div>
            <div class="listing-item mb-20 light-gray-bg">
                <div class="row grid-space-0">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="overlay-container">
                            <img src="/img/orange.png" alt="" style="width: 180px">

                        </div>
                    </div>
                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <div class="body">
                            <h3 class="margin-clear">South Louisiana IDPA</h3>

                            <div class="separator-2 mt-10"></div>
                            <p>South Louisiana IDPA is an Practical Pistol club. We meet on the second sunday of each month for a club level match and host a regional championship match once a year.</p>
                            <a href="<?php echo e(url('/myclub')); ?>">More information</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="listing-item mb-20 light-gray-bg">
                <div class="row grid-space-0">
                    <div class="col-sm-2 col-md-2 col-lg-2">
                        <div class="overlay-container">
                            <img src="/img/orange2.png" alt="" style="width: 180px">

                        </div>
                    </div>
                    <div class="col-sm-10 col-md-10 col-lg-10">
                        <div class="body">
                            <h3 class="margin-clear">ToastMasters</h3>

                            <div class="separator-2 mt-10"></div>
                            <p>The mission of a Toastmasters Club is to provide a mutually supportive and positive learining environment in which every individual member has the opportunity to
                                develop oral communication and leadership skills, which in turn foster self-confidence and personal growth.
                                ToastMasters meets on the last Tuesday of the month at the Jefferson Parish Library on Metaire Rd.6PM.
                            </p>
                            <a href="#">More information</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- section end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>