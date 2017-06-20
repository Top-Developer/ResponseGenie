<?php $__env->startSection('title'); ?>
    Become A Member
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if($message = Session::get('msg')): ?>
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><?php echo e($message); ?></strong>
        </div>
    <?php endif; ?>
    <div class="page-container">
        <div class="page-content-wrapper">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1> Become a member of <?php echo e($clubName); ?> </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
            </div>
            <!-- END PAGE HEAD-->

            <div class="page-content">
                <div class="container">
                    <div class="page-content-inner">
                        <div class="portlet light">
                            <div class="portlet-body tabbable-default">
                                <?php if($clubType == 'Open Club'): ?>
                                    <div class = 'row'>
                                        <?php $__currentLoopData = $membershipPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theMembership): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <div class = "col-md-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading" style = 'text-align:center'>
                                                    <span class="panel-title">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name"><?php echo e($theMembership -> name); ?></span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>$<?php echo e($theMembership -> cost); ?></span>
                                                    </span>
                                                </div>
                                                <div id = 'plan_desc' class = 'panel-body'><?php echo e($theMembership -> description); ?></div>
                                                <div class = 'panel-footer' style = 'text-align:right;'>
                                                    <form action="<?php echo e(url('/club/payForMembership')); ?>" method="post" style = 'display:inline-block;align:center;'>
                                                        <?php echo e(csrf_field()); ?>

                                                        <input type = hidden name = 'plan_id' value = '<?php echo e($theMembership -> id); ?>'>
                                                        <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                data-key = '<?php echo e($stripe_public_key); ?>'
                                                                data-name = '<?php echo e($theMembership -> name); ?>'
                                                                data-description = '<?php echo e($theMembership -> description); ?>'
                                                                data-amount = '<?php echo e(100 * $theMembership -> cost); ?>'
                                                                data-currecy = 'usd'
                                                                data-locale = 'auto'>
                                                        </script>
                                                    </form>
                                                </div>
                                                <div id = 'plan_dura' class = 'hidden'><?php echo e($theMembership -> duration_quantity); ?></div>
                                                <div id = 'plan_dura_unit' class = 'hidden'><?php echo e($theMembership -> duration_unit); ?></div>
                                                <div id = 'plan_is_for_mem' class = 'hidden'><?php echo e($theMembership -> is_for_members_only); ?></div>
                                                <div id = 'plan_id' class = 'hidden'><?php echo e($theMembership -> id); ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    </div>
                                <?php elseif($clubType == 'Privated Club'): ?>
                                    <?php if($role == 'invited'): ?>
                                        <div class = 'row'>
                                            <?php $__currentLoopData = $membershipPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theMembership): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <div class = "col-md-4">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading" style = 'text-align:center'>
                                                    <span class="panel-title">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name"><?php echo e($theMembership -> name); ?></span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>$<?php echo e($theMembership -> cost); ?></span>
                                                    </span>
                                                        </div>
                                                        <div id = 'plan_desc' class = 'panel-body'><?php echo e($theMembership -> description); ?></div>
                                                        <div class = 'panel-footer' style = 'text-align:right;'>
                                                            <form action="<?php echo e(url('/club/payForMembership')); ?>" method="post" style = 'display:inline-block;align:center;'>
                                                                <?php echo e(csrf_field()); ?>

                                                                <input type = hidden name = 'plan_id' value = '<?php echo e($theMembership -> id); ?>'>
                                                                <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                        data-key = '<?php echo e($stripe_public_key); ?>'
                                                                        data-name = '<?php echo e($theMembership -> name); ?>'
                                                                        data-description = '<?php echo e($theMembership -> description); ?>'
                                                                        data-amount = '<?php echo e(100 * $theMembership -> cost); ?>'
                                                                        data-currecy = 'usd'
                                                                        data-locale = 'auto'>
                                                                </script>
                                                            </form>
                                                        </div>
                                                        <div id = 'plan_dura' class = 'hidden'><?php echo e($theMembership -> duration_quantity); ?></div>
                                                        <div id = 'plan_dura_unit' class = 'hidden'><?php echo e($theMembership -> duration_unit); ?></div>
                                                        <div id = 'plan_is_for_mem' class = 'hidden'><?php echo e($theMembership -> is_for_members_only); ?></div>
                                                        <div id = 'plan_id' class = 'hidden'><?php echo e($theMembership -> id); ?></div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </div>
                                    <?php else: ?>
                                        <div class = 'row'>
                                            You can not be a member of <?php echo e($clubName); ?> unless you are invited to the club.
                                        </div>
                                    <?php endif; ?>
                                <?php elseif($clubType == 'Moderated Club'): ?>
                                    <?php if($role == 'invited'): ?>
                                        <div class = 'row'>
                                            <?php $__currentLoopData = $membershipPlans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theMembership): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                <div class = "col-md-4">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading" style = 'text-align:center'>
                                                    <span class="panel-title">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name"><?php echo e($theMembership -> name); ?></span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>$<?php echo e($theMembership -> cost); ?></span>
                                                    </span>
                                                        </div>
                                                        <div id = 'plan_desc' class = 'panel-body'><?php echo e($theMembership -> description); ?></div>
                                                        <div class = 'panel-footer' style = 'text-align:right;'>
                                                            <form action="<?php echo e(url('/club/payForMembership')); ?>" method="post" style = 'display:inline-block;align:center;'>
                                                                <?php echo e(csrf_field()); ?>

                                                                <input type = hidden name = 'plan_id' value = '<?php echo e($theMembership -> id); ?>'>
                                                                <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                        data-key = '<?php echo e($stripe_public_key); ?>'
                                                                        data-name = '<?php echo e($theMembership -> name); ?>'
                                                                        data-description = '<?php echo e($theMembership -> description); ?>'
                                                                        data-amount = '<?php echo e(100 * $theMembership -> cost); ?>'
                                                                        data-currecy = 'usd'
                                                                        data-locale = 'auto'>
                                                                </script>
                                                            </form>
                                                        </div>
                                                        <div id = 'plan_dura' class = 'hidden'><?php echo e($theMembership -> duration_quantity); ?></div>
                                                        <div id = 'plan_dura_unit' class = 'hidden'><?php echo e($theMembership -> duration_unit); ?></div>
                                                        <div id = 'plan_is_for_mem' class = 'hidden'><?php echo e($theMembership -> is_for_members_only); ?></div>
                                                        <div id = 'plan_id' class = 'hidden'><?php echo e($theMembership -> id); ?></div>
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                        </div>
                                    <?php elseif($role == 'pending'): ?>
                                        <form method = 'post' action = '<?php echo e(url("/club/request")); ?>'>
                                            <?php echo e(csrf_field()); ?>

                                            <div class = 'row'>
                                                You already sent request to become a member of <?php echo e($clubName); ?>.
                                                If you want to resend request, click the btton below.
                                            </div>
                                            <div class = 'row' style = 'text-align: right;'>
                                                <button type = 'submit' class="btn red">Resend request</button>
                                            </div>
                                        </form>
                                    <?php else: ?>
                                        <form method = 'post' action = '<?php echo e(url("/club/request")); ?>'>
                                            <?php echo e(csrf_field()); ?>

                                            <div class = 'row'>
                                                You can request to become a member of <?php echo e($clubName); ?> by clicking the following button.
                                                If the admin allows, you can pay and get a membership.
                                            </div>
                                            <div class = 'row' style = 'text-align: right;'>
                                                <button type = 'submit' class="btn red">Request to be a member</button>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                <?php elseif($clubType == 'Closed Club'): ?>
                                    <div class = 'row'>
                                        You can not be a member of <?php echo e($clubName); ?> because the club is closed club.
                                    </div>
                                <?php else: ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hometemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>