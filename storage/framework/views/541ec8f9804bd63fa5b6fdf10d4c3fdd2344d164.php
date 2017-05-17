<div class="note note-info">
    <h4 style="text-align:center;">Club Name : <?php echo e($theClub -> name); ?></h4>
    <div class="row">
        <div class = "col-md-6">
            <img src="/../storage/app/<?php echo e($theClub -> logo_path); ?>" class="card-body-image">
        </div>
        <div class = "col-md-6">
            Club Description :<br><?php echo e($theClub -> description); ?>

        </div>
    </div>
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
        <div class="col-md-3">
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-twitter tooltips" data-original-title="Twitter"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-yellow font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-google tooltips" data-original-title="Google"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-twitter tooltips" data-original-title="Twitter"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-yellow font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a>
            <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-google tooltips" data-original-title="Google"></a>
        </div>
        <div class="col-md-3">
            <div id="gmap_basic" class="gmaps"> </div>
        </div>
        <div class="col-md-3">
            <h1>City : <?php echo e($theContact -> city); ?></h1><br>
            <h1>State : <?php echo e($theContact -> state); ?></h1><br>
            <h1>Country : <?php echo e($theContact -> country); ?></h1>
        </div>
        <?php if( $thePCM || $theSCM ): ?>
            <div class="col-md-3">
                <?php if($thePCM): ?>
                    <div class = "row">
                        <div class = "col-md-6 contact-member">
                            <?php if( $thePCM -> profile_image != ''): ?>
                                <img src="/../storage/app/<?php echo e($thePCM -> profile_image); ?>">
                            <?php else: ?>
                                <img src="/uploads/images/users/0.png">
                            <?php endif; ?>
                        </div>
                        <div class = "col-md-6">
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
                        <div class = "col-md-6 contact-member">
                            <?php if( $theSCM -> profile_image != ''): ?>
                                <img src="/<?php echo e($theSCM -> profile_image); ?>">
                            <?php else: ?>
                                <img src="/uploads/images/users/0.png">
                            <?php endif; ?>
                        </div>
                        <div class = "col-md-6">
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