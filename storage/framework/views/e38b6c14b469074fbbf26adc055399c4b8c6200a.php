<div class="modal fade" id="import" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-full">
        <div class="modal-content">
            <form action = "<?php echo e(url('/import')); ?>" method = "post" class = "ajax">
                <?php echo e(csrf_field()); ?>

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title" style = "text-align:center;">Import current members of your club</h4>
                </div>
                <div class="modal-body">
                    <div class = "row">
                        <div class = "col-md-1">
                            #
                        </div>
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
                    <div class = "row member-input">
                        <div class = "col-md-1">
                            1
                        </div>
                        <div class = "col-md-2">
                            <input type = "text" id = "firstName">
                        </div>
                        <div class = "col-md-2">
                            <input type = "text" id = "lastName">
                        </div>
                        <div class = "col-md-2">
                            <input type = "email" id = "email">
                        </div>
                        <div class = "col-md-2">
                            <input type = "date" id = "joinDate">
                        </div>
                        <div class = "col-md-2">
                            <input type = "date" id = "expDate">
                        </div>
                        <button type="button" class="btn red btn-outline" id = "addALine"><span class="md-click-circle md-click-animate" style="height: 65px; width: 65px; top: -22.5px; left: -21.2344px;"></span>add</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn dark btn-outline" data-dismiss="modal"><span class="md-click-circle md-click-animate" style="height: 65px; width: 65px; top: -22.5px; left: -21.2344px;"></span>Cancel</button>
                    <button type="sumnit" class="btn green">OK</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>