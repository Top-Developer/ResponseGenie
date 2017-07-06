<div class="modal fade" id="invite" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action = "<?php echo e(url('/event/inviteMembr')); ?>" method = "post">
                <?php echo e(csrf_field()); ?>

                <input type = 'hidden' name = 'active_tab' value = 'tab_2_2'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Invite someone to the event</h4>
                </div>
                <div class="modal-body">
                    <div class = "row">
                        <div class ="col-md-6">
                            First Name
                        </div>
                        <div class ="col-md-6">
                            <input type = "text" name = "first_name"/>
                        </div>
                    </div>
                    <div class = "row">
                        <div class ="col-md-6">
                            Last Name
                        </div>
                        <div class ="col-md-6">
                            <input type = "text" name = "last_name"/>
                        </div>
                    </div>
                    <div class = "row">
                        <div class ="col-md-6">
                            Email
                        </div>
                        <div class ="col-md-6">
                            <input type = "email" name = "email"/>
                        </div>
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