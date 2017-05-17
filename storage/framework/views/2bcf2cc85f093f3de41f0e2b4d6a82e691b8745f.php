<h1 style = "text-align: center;">
    club name : <?php echo e($theClub -> name); ?>

</h1>
<h2 style = "text-align: center;">
    club description : <?php echo e($theClub -> description); ?>

</h2>
<?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
    <div class = "row">
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn blue btn-outline" data-toggle="modal" href="#invite"> Invite </button>
        </div>
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn green btn-outline" data-toggle="modal" href="#import"> Import </button>
        </div>
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn yellow btn-outline"> Spreadsheet View </button>
        </div>
    </div>
<?php endif; ?>

<?php $__currentLoopData = $theClubUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class = "note note-info">
        <div class = "row">
            <div class = "col-md-2">
                <?php echo e($aUser -> profile_image); ?>

                <?php if( $aUser -> profile_image != ''): ?>
                    <img src="/<?php echo e($theSCM -> profile_image); ?>">
                <?php else: ?>
                    <img src="/uploads/images/users/0.png">
                <?php endif; ?>
            </div>
            <div class = "col-md-4">
                <h4>
                    <?php echo e($aUser -> first_name); ?> <?php echo e($aUser -> last_name); ?>

                </h4>
                <h4>
                    <?php if( 'special' == App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description): ?>
                        special
                    <?php else: ?>
                        <?php echo e(App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description); ?>

                    <?php endif; ?>

                </h4>
            </div>
            <div class = "col-md-6">

            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>