<div class="note note-info">
    <h4 style="text-align:center;">Event Name : <?php echo e($event -> name); ?></h4>
    <div class="row">
        <div class = "col-md-6">
            <img src="<?php echo e($event -> logo_path); ?>" class="card-body-image">
        </div>
        <div class = "col-md-6">
            <div>
                Event Description :<br><?php echo e($event -> description); ?>

            </div>
        </div>
    </div>
</div>
<h1 style="text-align: center;">
    Event Prices
    <div style="float:right;">
        <a type="button" class="btn btn-danger" data-toggle="modal" href="#add_event_price"> Add event price </a>
    </div>
</h1>
<div class = "row">
<?php $__currentLoopData = $eventPrices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anEventPrice): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class = "col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-shopping-cart"></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name"><?php echo e($anEventPrice -> name); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
                        <a type="button" class="btn red-mint btn-outline sbold" data-toggle="modal" href="#edit_event_price">Edit</a>
                    <?php endif; ?>
                </h3>
            </div>
            <div id = 'plan_desc' class = 'panel-body'><?php echo e($anEventPrice -> description); ?></div>
            <div id = 'plan_cost' class = 'panel-footer'>
                <?php if( 0 == $anEventPrice -> cost ): ?>
                    Free
                <?php else: ?>
                    <form action="<?php echo e(url('/event/payForEvent')); ?>" method="post" style = 'display:inline-block;align:center;'>
                        <?php echo e(csrf_field()); ?>

                        <input type = hidden name = 'ePrice_id' value = '<?php echo e($anEventPrice -> id); ?>'>
                        <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                data-key = '<?php echo e($stripe_public_key); ?>'
                                data-name = '<?php echo e($anEventPrice -> name); ?>'
                                data-description = '<?php echo e($anEventPrice -> description); ?>'
                                data-amount = '<?php echo e(100 * $anEventPrice -> cost); ?>'
                                data-currency = 'usd'
                                data-locale = 'auto'>
                        </script>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
<div class="note note-info">
    <div class = "row">
        <?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
            <div style="float:right;">
                <a type="button" class="btn btn-danger"  data-toggle="modal" href="#edit_contact_info"> Edit contact information </a>
            </div>
        <?php endif; ?>
        <h3 style="text-align:center;">Location and Contact Information</h3>
    </div>
    <div class="row">
        <div class="col-md-1">
            <?php if( ($theContact -> level_in != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> linkedin != ''): ?>
                <a target='_blank' href="<?php echo e($theContact -> linkedin); ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-green bg-hover-grey-salsa font-white bg-hover-white socicon-linkedin tooltips" data-original-title="Linkedin"></a><br>
            <?php endif; ?>
            <?php if( ($theContact -> level_t != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> twitter != '' ): ?>
                <a target='_blank' href="<?php echo e($theContact -> twitter); ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-blue bg-hover-grey-salsa font-white bg-hover-white socicon-twitter tooltips" data-original-title="Twitter"></a><br>
            <?php endif; ?>
            <?php if( ($theContact -> level_f != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> facebook != ''): ?>
                <a target='_blank' href="<?php echo e($theContact -> facebook); ?>" class="socicon-btn socicon-sm socicon-btn-circle socicon-solid bg-red font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a><br>
            <?php endif; ?>
            <?php if( ($theContact -> level_y != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> youtube != ''): ?>
                <a target='_blank' href="<?php echo e($theContact -> youtube); ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-green bg-hover-grey-salsa font-white bg-hover-white socicon-youtube tooltips" data-original-title="Youtube"></a><br>
            <?php endif; ?>
            <?php if( ($theContact -> level_g != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> googleplus != ''): ?>
                <a target='_blank' href="<?php echo e($theContact -> googleplus); ?>" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-blue bg-hover-grey-salsa font-white bg-hover-white socicon-google tooltips" data-original-title="Google"></a><br>
            <?php endif; ?>
            <?php if( ($theContact -> level_m != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> mail != ''): ?>
                <a target='_blank' href="<?php echo e($theContact -> mail); ?>" class="socicon-btn socicon-sm socicon-btn-circle socicon-solid bg-red font-white bg-hover-grey-salsa socicon-mail tooltips" data-original-title="Mail"></a>
            <?php endif; ?>
        </div>
        <div class="col-md-3">
            <div id="gmap_contact" class="gmaps"> </div>
        </div>
        <div class="col-md-3">
            <h3>City : <?php echo e($theContact -> city); ?></h3><br>
            <h3>State : <?php echo e($theContact -> state); ?></h3><br>
            <h3>Country : <?php echo e($theContact -> country); ?></h3><br>
            <h3>Zipcode : <?php echo e($theContact -> zipcode); ?></h3>
        </div>
        <?php if( $thePCM || $theSCM ): ?>
            <div class="col-md-5">
                <?php if($thePCM): ?>
                    <div class = "row">
                        <div class = "col-md-4 contact-member">
                            <?php if( $thePCM -> profile_image != ''): ?>
                                <img src="/../storage/app/<?php echo e($thePCM -> profile_image); ?>">
                            <?php else: ?>
                                <img src="/uploads/images/users/0.png">
                            <?php endif; ?>
                        </div>
                        <div class = "col-md-8">
                            <h4>
                                <?php echo e($thePCM -> first_name); ?> <?php echo e($thePCM -> last_name); ?>

                            </h4>
                            <h4>
                                <?php echo e($thePCMRole); ?>

                            </h4>
                            <h4>
                                <?php echo e($thePCM -> email); ?>

                            </h4>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($theSCM): ?>
                    <div class = "row">
                        <div class = "col-md-4 contact-member">
                            <?php if( $theSCM -> profile_image != ''): ?>
                                <img src="/<?php echo e($theSCM -> profile_image); ?>">
                            <?php else: ?>
                                <img src="/uploads/images/users/0.png">
                            <?php endif; ?>
                        </div>
                        <div class = "col-md-8">
                            <h4>
                                <?php echo e($theSCM -> first_name); ?> <?php echo e($theSCM -> last_name); ?>

                            </h4>
                            <h4>
                                <?php echo e($theSCMRole); ?>

                            </h4>
                            <h4>
                                <?php echo e($theSCM -> email); ?>

                            </h4>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>