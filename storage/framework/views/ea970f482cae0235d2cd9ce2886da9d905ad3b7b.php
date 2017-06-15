<div class="modal fade" id="manual-trans" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class = 'ajax' method = 'post' action = '<?php echo e(url("/enter/manual_transaction")); ?>' id = 'mtForm'>
                <?php echo e(csrf_field()); ?>

                <div class="modal-header">
                    <h4 style = "text-align: center;">Enter Manual Transaction</h4>
                </div>
                <div class="modal-body">
                    <div class = "row">
                        <div class = 'col-md-1'></div>
                        <div class = 'col-md-2'>
                            User
                        </div>
                        <div class = 'col-md-3'>
                            <select name = 'user' id = 'userSelector'>
                                <?php $__currentLoopData = $theClubUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value = 'online:<?php echo e($aUser -> id); ?>'><?php echo e($aUser -> first_name); ?> <?php echo e($aUser -> last_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                        <div class = 'col-md-2' style = 'text-align:right;'>
                            Amount
                        </div>
                        <div class = 'col-md-2'>
                            <input type = 'number' name = 'mt_amount' id = 'amount' min = '0'>
                        </div>
                        <div>($)</div>
                    </div>
                    <div class = "row">
                        <div class = 'col-md-1'></div>
                        <div class = 'col-md-2'>
                            Apply To
                        </div>
                        <div class = 'col-md-3'>
                            <select name = 'applyTo' id = 'trSelector'>
                                <?php $__currentLoopData = $theClub -> membership_plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aPlan): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <option value = 'membership_plan:<?php echo e($aPlan -> id); ?>'><?php echo e($aPlan -> name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn purple" id = 'sandn'>Save and New</button>
                    <button type="submit" class="btn green">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>