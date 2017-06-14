<h1 style = 'text-align:center;'>Discounts</h1>
<div class="portlet light portlet-fit portlet-datatable " id="form_wizard_1">
    <div class="portlet-title">
        <div class = 'actions'>
            <a type="button" class="btn btn-danger" data-toggle="modal" href="#add_discount"> New discount </a>
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

