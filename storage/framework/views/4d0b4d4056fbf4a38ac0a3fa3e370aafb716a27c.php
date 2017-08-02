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
                    <a href="<?php echo e(url('/event/create/'.$theClub->slug)); ?>" class="btn red"> Create a new event </a>
                </div>
                <?php endif; ?>
            </div>

            <div class="portlet-body">
                <?php $__currentLoopData = $eventDates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anEvent): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="card">
                    <div class="card-content">
                        <div class="card-header-green">
                            <a href="<?php echo e(url('/events/'.$anEvent->slug)); ?>">
                                <h1 class="card-heading"><?php echo e($anEvent->name); ?></h1>
                            </a>
                        </div>
                        <div class="card-body">
                            <div>
                                Start Date : <?php echo e($anEvent->start_date); ?>

                            </div>
                            <div>
                                End Date : <?php echo e($anEvent->end_date); ?>

                            </div>
                            <div>
                                Description : <?php echo e($anEvent->description); ?>

                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        </div>
        <!-- End Portlet -->
    </div>
</div>