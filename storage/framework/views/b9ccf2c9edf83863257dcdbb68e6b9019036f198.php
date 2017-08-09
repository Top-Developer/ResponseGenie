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
                        <h1> Become a member of <?php echo e($eventName); ?> </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
            </div>
            <!-- END PAGE HEAD-->

            <div class="page-content">
                <div class="container">
                    <div class="page-content-inner">
                        <div class="portlet light">
                            <div class="portlet-body table-default">
                                <?php if( $count == 0 ): ?>
                                    You can not join this event because the event has not any price yet.
                                <?php else: ?>
                                    <?php $__currentLoopData = $eventPrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $eventPrice): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <?php if($eventType == 'Public'): ?>
                                            <?php if(0==$eventPrice->members_only||(1==$eventPrice->members_only&&$isMember)||(1==$eventPrice->members_only&&$isInvited)): ?>
                                                <div class = 'row'>
                                                    <div class = "col-md-4">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading" style = 'text-align:center'>
                                                            <span class="panel-title">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name"><?php echo e($eventPrice->name); ?></span>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                <?php if( 0 == $eventPrice->cost ): ?>
                                                                    Free
                                                                <?php else: ?>
                                                                    <span id = 'plan_cost'>$<?php echo e($eventPrice->cost); ?></span>
                                                                <?php endif; ?>
                                                            </span>
                                                            </div>
                                                            <div id = 'plan_desc' class = 'panel-body'><?php echo e($eventPrice->description); ?></div>
                                                            <div class = 'panel-footer' style = 'text-align:right;'>
                                                                <?php if( 0 == $eventPrice->cost ): ?>
                                                                    <form action="<?php echo e(url('events/'.$eventSlug.'/payForEventMembership')); ?>" method="post" style = 'display:inline-block;align:center;'>
                                                                        <?php echo e(csrf_field()); ?>

                                                                        <input type = hidden name = 'ePrice_id' value = '<?php echo e($eventPrice->id); ?>'>
                                                                        <button type="submit" class="stripe-button-el" style="visibility: visible;">
                                                                    <span style="display: block; min-height: 30px;">
                                                                        Join
                                                                    </span>
                                                                        </button>
                                                                    </form>
                                                                <?php else: ?>
                                                                    <form action="<?php echo e(url('events/'.$eventSlug.'/payForEventMembership')); ?>" method="post" style = 'display:inline-block;align:center;'>
                                                                        <?php echo e(csrf_field()); ?>

                                                                        <input type = hidden name = 'ePrice_id' value = '<?php echo e($eventPrice->id); ?>'>
                                                                        <script src = '<?php echo e('https://checkout.stripe.com/checkout.js'); ?>' class = 'stripe-button'
                                                                                data-key = '<?php echo e($stripe_public_key); ?>'
                                                                                data-name = '<?php echo e($eventPrice->name); ?>'
                                                                                data-description = '<?php echo e($eventPrice->description); ?>'
                                                                                data-amount = '<?php echo e(100*$eventPrice->cost); ?>'
                                                                                data-currency = 'usd'
                                                                                data-locale = 'auto'>
                                                                        </script>
                                                                    </form>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php elseif($eventType == 'Members Only'): ?>
                                            <?php if($isMember||$isInvited): ?>
                                                <div class = 'row'>
                                                    <div class = "col-md-4">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading" style = 'text-align:center'>
                                                        <span class="panel-title">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name"><?php echo e($eventPrice->name); ?></span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>$<?php echo e($eventPrice->cost); ?></span>
                                                        </span>
                                                            </div>
                                                            <div id = 'plan_desc' class = 'panel-body'><?php echo e($eventPrice->description); ?></div>
                                                            <div class = 'panel-footer' style = 'text-align:right;'>
                                                                <form action="<?php echo e(url('events/'.$eventSlug.'/payForEventMembership')); ?>" method="post" style = 'display:inline-block;align:center;'>
                                                                    <?php echo e(csrf_field()); ?>

                                                                    <input type = hidden name = 'ePrice_id' value = '<?php echo e($eventPrice->id); ?>'>
                                                                    <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                            data-key = '<?php echo e($stripe_public_key); ?>'
                                                                            data-name = '<?php echo e($eventPrice->name); ?>'
                                                                            data-description = '<?php echo e($eventPrice->description); ?>'
                                                                            data-amount = '<?php echo e(100 * $eventPrice->cost); ?>'
                                                                            data-currency = 'usd'
                                                                            data-locale = 'auto'>
                                                                    </script>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php elseif($eventType == 'Invite Only'): ?>
                                            <?php if($isInvited): ?>
                                                <div class = 'row'>
                                                    <div class = "col-md-4">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading" style = 'text-align:center'>
                                                        <span class="panel-title">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name"><?php echo e($eventPrice -> name); ?></span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>$<?php echo e($eventPrice -> cost); ?></span>
                                                        </span>
                                                            </div>
                                                            <div id = 'plan_desc' class = 'panel-body'><?php echo e($eventPrice -> description); ?></div>
                                                            <div class = 'panel-footer' style = 'text-align:right;'>
                                                                <form action="<?php echo e(url('/club/payForMembership')); ?>" method="post" style = 'display:inline-block;align:center;'>
                                                                    <?php echo e(csrf_field()); ?>

                                                                    <input type = hidden name = 'ePrice_id' value = '<?php echo e($eventPrice->id); ?>'>
                                                                    <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                            data-key = '<?php echo e($stripe_public_key); ?>'
                                                                            data-name = '<?php echo e($eventPrice -> name); ?>'
                                                                            data-description = '<?php echo e($eventPrice -> description); ?>'
                                                                            data-amount = '<?php echo e(100 * $eventPrice -> cost); ?>'
                                                                            data-currency = 'usd'
                                                                            data-locale = 'auto'>
                                                                    </script>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
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