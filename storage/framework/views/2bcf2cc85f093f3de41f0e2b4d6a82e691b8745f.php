<h1 style = "text-align: center;">
    club name : <?php echo e($theClub -> name); ?>

</h1>
<h2 style = "text-align: center;">
    club description : <?php echo e($theClub -> description); ?>

</h2>
<?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
<div class = "row">
    <div class = "col-md-8">
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn blue btn-outline" data-toggle="modal" href="#invite"> Invite </button>
        </div>
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn green btn-outline" data-toggle="modal" href="#import"> Import </button>
        </div>
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn purple btn-outline" id = "member_view_toggle"> Spreadsheet View </button>
        </div>
    </div>
    <div class = "col-md-4 hidden" style = "text-align: center;">
        <button type="button" class="btn dark btn-outline" data-toggle="modal" href="#sel-col"> Select Columns </button>
    </div>
</div>
<?php endif; ?>

<div class = "active">
    <?php $__currentLoopData = $onlineMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div class = "note note-info">
        <div class = "row">
            <div class = "col-md-2">
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
                <?php if( 'invited' == App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description ): ?>
                    <button type="button" class="btn green btn-outline disabled">Invited at <?php echo e(App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> created_at); ?></button>
                    <button type="button" class="btn red btn-outline">Resend Invitation</button>
                <?php elseif( 'pending' == App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description ): ?>
                    <button type="button" class="btn green">Approve</button>
                    <button type="button" class="btn red">Deny</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    <?php $__currentLoopData = $offlineMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class = "note note-info">
            <div class = "row">
                <div class = "col-md-2">
                    <img src="/uploads/images/users/0.png">
                </div>
                <div class = "col-md-4">
                    <h4>
                        <?php echo e($aUser -> fname); ?> <?php echo e($aUser -> lname); ?>

                    </h4>
                    <h4>
                        offline member
                    </h4>
                </div>
                <div class = "col-md-6">
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
</div>
<div class ="hidden">
    <div class="portlet light portlet-fit portlet-datatable " id="form_wizard_1">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase"> Memberlist </span>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover order-column" id="sample_2">
                <thead>
                <tr>
                    <th class= "col-table-admin"> Admin </th>
                    <th class= "col-table-fn"> First Name </th>
                    <th class= "col-table-ln"> Last Name </th>
                    <th class= "col-table-jdate"> Join Date </th>
                    <th class= "col-table-edate"> Expiration Date </th>
                    <th class= "col-table-exp"> Expired </th>
                    
                    
                    
                    
                    
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $onlineMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td class= "col-table-admin">
                            <input type="checkbox" class="checkboxes" disabled <?php if($aUser -> role_description == 'owner' || $aUser -> role_description == 'admin'): ?> checked <?php endif; ?>>
                        </td>
                        <td class= "col-table-fn">
                            <?php echo e($aUser -> first_name); ?>

                        </td>
                        <td class= "col-table-ln">
                            <?php echo e($aUser -> last_name); ?>

                        </td>
                        <td class= "col-table-jdate">
                            <?php echo e($aUser -> join_date); ?>

                        </td>
                        <td class= "col-table-edate">
                            <?php echo e($aUser -> expiration_date); ?>

                        </td>
                        <td class= "col-table-exp">
                            <input type="checkbox" class="checkboxes" disabled <?php if($aUser -> expiration_date == 'owner' || $aUser -> role_description == 'admin'): ?> checked <?php endif; ?>>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php $__currentLoopData = $offlineMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td class= "col-table-admin">
                            <input type="checkbox" class="checkboxes" disabled>
                        </td>
                        <td class= "col-table-fn">
                            <?php echo e($aUser -> fname); ?>

                        </td>
                        <td class= "col-table-ln">
                            <?php echo e($aUser -> lname); ?>

                        </td>
                        <td class= "col-table-jdate">
                            <?php echo e($aUser -> joinDate); ?>

                        </td>
                        <td class= "col-table-edate">
                            <?php echo e($aUser -> expDate); ?>

                        </td>
                        <td class= "col-table-exp">
                            <input type="checkbox" class="checkboxes" disabled value = '<?php echo e(Carbon\Carbon::now() -> format("Y-m-d H:i:s")); ?>' <?php if(  Carbon\Carbon::now() -> format('Y-m-d H:i:s') > ($aUser -> expDate) ): ?> checked <?php endif; ?>>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>