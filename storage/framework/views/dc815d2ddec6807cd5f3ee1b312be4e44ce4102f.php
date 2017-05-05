<?php $__env->startSection('title'); ?>
    Club Management
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<style>
    .card {
        background:#FFF;
        display: block;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        border:1px solid #AAA;
        border-bottom:3px solid #BBB;
        padding:0px;
        margin-bottom:1em;
        overflow:hidden;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-body{
        display:flex;
    }

    .card-content {
        width: 100%;
    }

    .pull-left {
        float: left;
    }

    .pull-none {
        float: none !important;
    }

    .pull-right {
        float: right;
    }

    .card-header{
        width:100%;
        color:#2196F3;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);

    }

    .card-header-blue{
        background-color:#2196F3;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-header-red{
        background-color:#F44336;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-header-grey{
        background-color:#424242;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-header-orange{
        background-color:#E65100;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-header-pink{
        background-color:#E91E63;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-heading {
        display: block;
        font-size: 25px;
        line-height: 20px;
        margin-bottom: 24px;
        border-bottom: 1px #2196F3;
        text-align: center;
        color:#fff;

    }
    .card-footer{
        border-top:1px solid #eee;
        padding: 10px;
        text-align: center;
        background-color: rgb(235, 237, 241);

    }

    .card-footer a:hover {
        text-decoration: none;
    }

    .card-action-pink{
        color:#E91E63;
        font-size: large;
    }
    .card-action-red{
        color:#F44336;
        font-size: large;
    }
    .card-action-grey{
        color:#424242;
        font-size: large;
    }
    .card-action-pink{
        color:#E91E63;
        font-size: large;
    }
    .card-action-orange{
        color:#E65100;
        font-size: large;
    }


    .card-image img {
        display: block;
        height: auto;
        width: 100%;

    }

    .card-body-image {
        width: 100%;
        height: 150px;
        border: 1px solid transparent;
        border-radius: 5px;
    }

    .card-body-section {
        display: block;
        width: 50%;
        padding: 10px;
    }

    .card-date-label {
        font-size: 16px;
        font-weight: 500;
        color: #5b9bd1;
    }

    .card-date-box {
        height: 50%;
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<!-- BEGIN PAGE CONTENT INNER -->

<div class="page-container">
    <div class="page-content-wrapper">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <div class="container">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1> Your clubs and members. </h1>
                </div>
                <!-- END PAGE TITLE -->
                <!-- BEGIN PAGE TOOLBAR -->
                <div class="page-toolbar">
                    <a href="http://test.rosterfi.com/createClub" class="btn blue" style="margin-top: 15px;">Create a new club</a>
                </div>
                <!-- END PAGE TOOLBAR -->
            </div>
        </div>
        <!-- END PAGE HEAD-->

        <div class="page-content">
            <div class="container">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="/">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Clubs</span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMBS -->

                <div class="page-content-inner">
                    <div class="portlet light">
                        <div class="portlet-body tabbable-default">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_2_1" data-toggle="tab"> Club Info </a>
                                </li>
                                <li>
                                    <a href="#tab_2_2" data-toggle="tab"> Members </a>
                                </li>
                                <li>
                                    <a href="#tab_2_3" data-toggle="tab"> Configure Club </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Tab1 start -->
                                <div class="tab-pane fade active in" id="tab_2_1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-content">
                                                    <div class="card-header-blue">
                                                        <h1 class="card-heading"><?php echo e($theClub -> name); ?></h1>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-body-section">
                                                            <img src="/<?php echo e($theClub -> logo_path); ?>" class="card-body-image">
                                                        </div>
                                                        <div class="card-body-section">
                                                            <div class="card-date-box">
                                                                <span class="card-date-label"> Joined </span><br>
                                                                <span class="pull-right"><?php echo e($theClub -> created_at); ?></span>
                                                            </div>
                                                            <div class="card-date-box">
                                                                <span class="card-date-label"> Expires </span><br>
                                                                <span class="pull-right">3/17/2018</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <?php if( $theRole == 2 || $theRole == 3 ): ?>
                                                            <a href="<?php echo e(route('configclub', ['id' => $theClub -> id])); ?>" class="card-action-orange"> Administrator </a>
                                                        <?php elseif( $theRole == 4 ): ?>
                                                            <a href="<?php echo e(route('configclub', ['id' => $theClub -> id])); ?>" class="card-action-blue"> Member </a>
                                                        <?php elseif( $theRole == 5 ): ?>
                                                            <a href="javascript:;" class="card-action-pink"> Invited </a>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                <div class="tab-pane fade" id="tab_2_2">

                                </div>
                                <div class="tab-pane fade" id="tab_2_3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.hometemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>