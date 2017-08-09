<?php $__env->startSection('title'); ?>
    All Clubs
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

    .portlet-body .row div{
        float:left;
    }

    .portlet-body .row div:first-child{
        width:120px;
    }

    .portlet-body .row div:first-child img{
        width:100px;
        margin-left:10px;
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
                    <h1>You can see all clubs that you can join.</h1>
                </div>
                <!-- END PAGE TITLE -->
                <!-- BEGIN PAGE TOOLBAR -->
                <div class="page-toolbar">
                    <a href="<?php echo e(url('/createClub')); ?>" class="btn blue" style="margin-top: 15px;">Create a new club</a>
                </div>
                <!-- END PAGE TOOLBAR -->
            </div>
        </div>
        <!-- END PAGE HEAD-->

        <?php if(Session::has('message')): ?>
            <div class="alert alert-<?php echo e(Session::get('status')); ?> status-box"  style = 'text-align:center;'>
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <?php echo e(Session::get('message')); ?>

            </div>
        <?php endif; ?>

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
                    <div class="row ui-sortable" id="sortable_portlets">
                        <?php $__currentLoopData = $allClubs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aClub): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <div class="col-xs-12 col-sm-6 column sortable">
                                <div class="portlet portlet-sortable box blue-hoki">
                                    <div class="portlet-title ui-sortable-handle">
                                        <div class = "caption"><?php echo e($aClub -> name); ?></div>
                                        <div class="actions">
                                            <?php if(is_null($aClub->member_user_id)): ?>
                                                <?php if('Privated Club' == $aClub->type): ?>
                                                    <?php if(is_null($aClub->role_id)): ?>
                                                        <a class="btn red">Private Club, not invited</a>
                                                    <?php elseif(2 == $aClub->role_id || 3 == $aClub->role_id): ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub -> slug)); ?>" class="btn green">Go to the club</a>
                                                    <?php elseif(4 == $aClub->role_id): ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub -> slug.'/become-a-member')); ?>" class="btn red">Become a member</a>
                                                    <?php endif; ?>
                                                <?php elseif('Open Club' == $aClub->type): ?>
                                                    <?php if(2 == $aClub->role_id || 3 == $aClub->role_id): ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub->slug)); ?>" class="btn green">Go to the club</a>
                                                    <?php else: ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub->slug.'/become-a-member')); ?>" class="btn red">Become a member</a>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub->slug)); ?>" class="btn green">Visit the club</a>
                                                    <?php endif; ?>
                                                <?php elseif('Closed Club' == $aClub->type): ?>
                                                    <?php if(2 == $aClub->role_id || 3 == $aClub->role_id): ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub -> slug)); ?>" class="btn green">Go to the club</a>
                                                    <?php else: ?>
                                                        <a class="btn red">Closed Club</a>
                                                    <?php endif; ?>
                                                <?php elseif('Moderated Club' == $aClub->type): ?>
                                                    <?php if(is_null($aClub->role_id)): ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub -> slug.'/request')); ?>" class="btn red">Request to be a member</a>
                                                    <?php elseif(2 == $aClub->role_id || 3 == $aClub->role_id): ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub -> slug)); ?>" class="btn green">Go to the club</a>
                                                    <?php elseif(4 == $aClub->role_id || 6 == $aClub->role_id): ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub -> slug.'/become-a-member')); ?>" class="btn red">Become a member</a>
                                                    <?php elseif(5 == $aClub->role_id): ?>
                                                        <a href="<?php echo e(url('/clubs/'.$aClub -> slug.'/request')); ?>" class="btn red">Resend a request</a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(url('/clubs/'.$aClub -> slug)); ?>" class="btn green">Go to the club</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="portlet-body">
                                        <div class = "row">
                                            <div>
                                                <img style="width:100px;" src=<?php echo e($aClub -> logo_path); ?>>
                                            </div>
                                            <div>
                                                <p><?php echo e($aClub -> description); ?></p>
                                                <p><?php echo e($aClub -> slug); ?></p>
                                                <p>
                                                    <a style="text-decoration:none;" href="<?php echo e($aClub -> website); ?>"><?php echo e($aClub -> website); ?></a>
                                                </p>
                                                <p><?php echo e($aClub -> city); ?> <?php echo e($aClub -> state); ?> <?php echo e($aClub -> country); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script src="../assets/pages/scripts/portlet-draggable.min.js" type="text/javascript"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hometemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>