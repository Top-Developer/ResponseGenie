<?php $__env->startSection('title'); ?>
    Verify your email
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content" style="width: 600px !important;">
        <div class="row">
            <div class="col-sm-1">
                <img src="/img/social/mailbox.png">
            </div>
            <div class="col-sm-11">
                <h2 class="text-center">Welcome to Rosterfi!</h2>
                <br>

                <h4>Please check your inbox and validate your email address to continue!</h4>
            </div>
        </div>

        
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.access', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>