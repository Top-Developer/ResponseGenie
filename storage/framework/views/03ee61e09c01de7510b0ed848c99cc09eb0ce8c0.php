<div id="add_discount" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class = "ajax" action = "<?php echo e(url('/add/discount')); ?>" method = "post">
                <?php echo e(csrf_field()); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">New discount</h4>
                </div>
                <div class="modal-body">
                    <div class = "row form-group">
                        <div class="col-md-2"></div>
                        <div class="col-md-3">
                            Discount Name
                        </div>
                        <div class = 'col-md-5'>
                            <input type = 'text' name = 'discount_name'>
                        </div>
                    </div>
                    <div class = "row form-group">
                        <div class="col-md-2">
                            Type
                        </div>
                        <div class = 'col-md-4'>
                            <input type = 'radio' name = 'discount_type' value = 'amount' id = 'aradio' checked><label for = 'aradio'>$ (Dollar Amount)</label><br>
                            <input type = 'radio' name = 'discount_type' value = 'percentage' id = 'pradio'><label for = 'pradio'>% (Percentage)</label>
                        </div>
                        <div class = 'col-md-2' style = 'text-align:right;'>
                            Amount
                        </div>
                        <div class = 'col-md-3'>
                            <input type = 'number' name = 'discount_amount' id = 'amount' min = '0'>
                        </div>
                        <div class = 'col-md-1'>
                            <span>(</span><span id = 'unit'>$</span><span>)</span>
                        </div>
                    </div>
                    <div class = "row form-group">
                        <div class="col-md-2">
                            Apply To
                        </div>
                        <div class = 'col-md-4'>
                            <select name = 'discount_apply'>
                                <option value = 'new'>New Members</option>
                                <option value = 'existing'>Existing Members</option>
                                <option value = 'selected'>Selected Members</option>
                                <option value = 'everyone'>Everyone</option>
                            </select>
                        </div>
                        <div class = 'col-md-2' style = 'text-align:right;'>
                            Expires
                        </div>
                        <div class = 'col-md-4'>
                            <input type = 'date' name = 'discount_exp'>
                        </div>
                    </div>
                    <div class = 'row form-group'>
                        <div class = 'col-md-12'>
                            <table class="table table-striped table-bordered table-hover order-column" id="sample_2">
                                <thead>
                                <tr>
                                    <th> Select </th>
                                    <th> First Name </th>
                                    <th> Last Name </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $offlineMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aUser): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="checkboxes" disabled <?php if($aUser -> role_description == 'owner' || $aUser -> role_description == 'admin'): ?> checked <?php endif; ?>>
                                        </td>
                                        <td>
                                            <?php echo e($aUser -> fname); ?>

                                        </td>
                                        <td>
                                            <?php echo e($aUser -> lname); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class = "row form-group">
                        <div class="col-md-2">
                            Uses
                        </div>
                        <div class = 'col-md-4'>
                            <input readonly name = 'discount_uses'>
                        </div>
                    </div>
                    <div class = "row form-group">
                        <div class="col-md-12">
                            <label for = "disc_desc">Discount Text</label>
                        </div>
                        <div class="col-md-12">
                            <textarea id = 'disc_desc' name = 'dDesc' rows = '4' style = 'width: 100%;' placeholder = 'You have received a discount for your membership to Toastmasters. We are discounting membership by %10 percent for the month of march. Renew now to take advantage of this offer.'></textarea>
                        </div>
                    </div>
                    <div class = "row form-group">
                        <input type="checkbox" id = "send_msg" name = "send_msg">
                        <label for = "send_msg">Send Discount Message to effected members?</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn green">OK</button>
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>