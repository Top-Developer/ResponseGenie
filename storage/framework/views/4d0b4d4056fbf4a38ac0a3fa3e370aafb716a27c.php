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
                <?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
                <div style="float:right;">
                    <a href="<?php echo e(url('/'.$theClub -> slug.'/create-an-event')); ?>" class="btn red"> Create a new event </a>
                </div>
                <?php endif; ?>
            </div>

            <div class="portlet-body">
                <?php $__currentLoopData = $clubEvents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anEvent): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="row eventcontainer">
                    <div class="col-md-3 text-center monthdate">
                        <span class="date"><?php echo e($anEvent->start_date); ?></span>
                    </div>
                    <div class="col-md-9">
                        <span class="small mb-10 text-muted"><?php echo e($anEvent->name); ?></span>
                        <h6 class="title"><?php echo e($anEvent->description); ?></h6>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>
        <!-- End Portlet -->
    </div>
</div>