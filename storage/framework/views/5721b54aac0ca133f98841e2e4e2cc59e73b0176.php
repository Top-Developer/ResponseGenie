<h1 style = 'text-align:center;'><?php echo e($theClub -> name); ?></h1>
<h2 style = 'text-align:center;'><?php echo e($event -> name); ?></h2>
<div class="portlet light portlet-fit portlet-datatable " id="form_wizard_1">
    <div class="portlet-title">
        <div class = 'actions'>
            <a type="button" class="btn btn-danger" data-toggle="modal" href="#sel-trans-cols"> Select Columns </a>
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover order-column" id="dataTb">
            <thead>
            <tr>
                <th class = 'col-tr-date'> Date </th>
                <th class = 'col-tr-fn'> First Name </th>
                <th class = 'col-tr-ln'> Last Name </th>
                <th class = 'col-tr-amount'> Amount </th>
                <th class = 'col-tr-source'> Source </th>
                <th class = 'col-tr-re'> Receipt </th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $transForEvent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aTrans): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td class = 'col-tr-date'><?php echo e($aTrans -> date); ?></td>
                    <td class = 'col-tr-fn'><?php echo e($aTrans -> first_name); ?></td>
                    <td class = 'col-tr-ln'><?php echo e($aTrans -> last_name); ?></td>
                    <td class = 'col-tr-amount'><?php echo e($aTrans -> amount); ?></td>
                    <td class = 'col-tr-source'><?php echo e($aTrans -> source); ?></td>
                    <td class = 'col-tr-re'><?php echo e($aTrans -> receipt); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </tbody>
        </table>
        <div class = 'row'>
            <div class = 'col-md-6'>
                <a type="button" class="btn purple btn-outline export" download = 'export.csv' id = 'downCSV'> Download CSV </a>
            </div>
            <div class = 'col-md-6' style = 'text-align:right;'>
                <button type="button" class="btn purple btn-outline" data-toggle="modal" href="#event-manual-trans" id = 'emt'>Enter Manual Transactions</button>
            </div>
        </div>
    </div>
    <div class="portlet-footer">
    </div>
</div>