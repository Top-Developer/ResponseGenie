<?php if($message = Session::get('members_msg')): ?>
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e($message); ?></strong>
    </div>
<?php endif; ?>
<h1 style = "text-align: center;">
    event name : <?php echo e($event -> name); ?>

</h1>
<h2 style = "text-align: center;">
    event description : <?php echo e($event -> description); ?>

</h2>
<?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
    <div class = "row">
        <div class = "col-md-8">
            <div class = "col-md-4" style = "text-align: center;">
                <button type="button" class="btn blue btn-outline" data-toggle="modal" href="#invite"> Invite </button>
            </div>
            <div class = "col-md-4" style = "text-align: center;"></div>
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
    <?php $__currentLoopData = $eventMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <div class = "note note-info">
            <div class = "row">
                <div class = "col-md-2">
                    <?php if( $aUser -> profile_image != ''): ?>
                        <img src="/<?php echo e($aUser -> profile_image); ?>">
                    <?php else: ?>
                        <img src="/uploads/images/users/0.png">
                    <?php endif; ?>
                </div>
                <div class = "col-md-4">
                    <h4>
                        <?php echo e($aUser -> first_name); ?> <?php echo e($aUser -> last_name); ?>

                    </h4>
                </div>
                <div class = "col-md-6">
                    <?php if( '1' == $aUser -> invited ): ?>
                        <button type="button" class="btn green btn-outline disabled">Invited at <?php echo e($aUser -> invite_date); ?></button>
                        <button type="button" class="btn red btn-outline">Resend Invitation</button>
                    <?php endif; ?>
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
            <table class="table table-striped table-bordered table-hover order-column" id="members-table">
                <thead>
                <tr>
                    <th class= "col-table-admin"> Admin </th>
                    <th class= "col-table-fn"> First Name </th>
                    <th class= "col-table-ln"> Last Name </th>
                    <th class= "col-table-idate"> Invited Date </th>
                    <th class= "col-table-adate"> Accepted Date </th>
                    
                    
                    
                    
                    
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $eventMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <tr>
                        <td class= "col-table-admin">
                            <input type="checkbox" class="checkboxes" disabled>
                        </td>
                        <td class= "col-table-fn">
                            <?php echo e($aUser -> first_name); ?>

                        </td>
                        <td class= "col-table-ln">
                            <?php echo e($aUser -> last_name); ?>

                        </td>
                        <td class= "col-table-idate">
                            <?php echo e($aUser -> invite_date); ?>

                        </td>
                        <td class= "col-table-adate">
                            <?php if(!$aUser -> invited): ?>
                                <?php echo e($aUser -> accept_date); ?>

                            <?php else: ?>
                                invited
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </tbody>
            </table>
            <a type="button" class="btn purple btn-outline export for-members">
                Export CSV
            </a>
        </div>
    </div>
</div>