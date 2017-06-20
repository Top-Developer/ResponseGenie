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
                <th> Created Date </th>
                <th> Name </th>
                <th> Amount </th>
                <th> Applied to </th>
                <th> Uses </th>
                <th> Expires </th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $discounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aDiscount): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td>
                        <?php echo e($aDiscount -> created_at); ?>

                    </td>
                    <td>
                        <?php echo e($aDiscount -> name); ?>

                    </td>
                    <td>
                        <?php echo e($aDiscount -> amount); ?>

                    </td>
                    <td>
                        <?php if( $aDiscount -> applyTo == 'existing' ): ?>
                            Existing Members
                        <?php elseif( $aDiscount -> applyTo == 'new' ): ?>
                            New members
                        <?php elseif( $aDiscount -> applyTo == 'selected' ): ?>
                            Selected Members
                        <?php elseif( $aDiscount -> applyTo == 'everyone' ): ?>
                            Everyone
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php echo e($aDiscount -> uses); ?>

                    </td>
                    <td>
                        <?php echo e($aDiscount -> expDate); ?>

                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
    </div>
</div>

