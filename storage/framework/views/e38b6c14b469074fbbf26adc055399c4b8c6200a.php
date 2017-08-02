<div class="modal fade" id="import" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <form action = "<?php echo e(url('/offline-member/import')); ?>" method = "post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                <input type = 'hidden' name = 'active_tab' value = 'tab_2_3'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" style = "text-align:center;">Import current members of your club</h4>
                </div>
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-1" style = "text-align: right;">#</div>
                        <div class = "col-md-2">
                            First Name
                        </div>
                        <div class = "col-md-2">
                            Last Name
                        </div>
                        <div class = "col-md-2">
                            Email
                        </div>
                        <div class = "col-md-2">
                            Join Date
                        </div>
                        <div class = "col-md-2">
                            Expiration Date
                        </div>
                    </div>
                    <div class = "row member-input" id = "info-wrapper">
                        <div class = "col-md-1" style = "text-align: right;">
                            1
                        </div>
                        <div class = "col-md-2">
                            <input type = "text" id = "firstName" name = "m_name_first[]" required>
                        </div>
                        <div class = "col-md-2">
                            <input type = "text" id = "lastName" name = "m_name_last[]" required>
                        </div>
                        <div class = "col-md-2">
                            <input type = "email" id = "email" name = "m_email[]" required>
                        </div>
                        <div class = "col-md-2">
                            <input type = "date" id = "joinDate" name = "m_join_date[]" required>
                        </div>
                        <div class = "col-md-2">
                            <input type = "date" id = "expDate" name = "m_exp_date[]" required>
                        </div>
                    </div>
                    <div class = "row">
                        <div class = "col-md-4 col-md-offset-8">
                            <button type="button" class="btn purple btn-outline" id = "addALine">Add a new memebr</button>
                            <button type="button" class="btn red btn-outline" id = "removeALine">Remove a memebr</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <span>Or upload CSV files. * use the columns above.</span>
                    <input type = 'file' name = 'csv_files' id = 'csv_file' class = 'hidden' accept='.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel'>
                    <label for = 'csv_file' class = 'btn blue btn-outline'>Upload csv files</label>
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn green">OK</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>