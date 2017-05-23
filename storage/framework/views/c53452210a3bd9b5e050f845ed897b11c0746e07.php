<h1 style = "text-align: center;">
    Membership Plans
    <?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
        <div style="float:right;">
            <a type="button" class="btn btn-danger" data-toggle="modal" href="#add_new_plan"> Add new plan </a>
        </div>
    <?php endif; ?>
</h1>
<div class = "row">
    <?php $__currentLoopData = $theClub -> membership_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $theMembership): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class = "col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-shopping-cart"></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class = "plan_name"><?php echo e($theMembership -> name); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" class="btn red-mint btn-outline sbold" data-toggle="modal" href="#edit_plan">Edit</a>
                </h3>
            </div>
            <div class="panel-body"> <?php echo e($theMembership -> description); ?> </div>
            <div class="panel-footer"> <?php echo e($theMembership -> cost); ?> </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>