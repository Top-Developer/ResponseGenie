<div id="edit_event_price" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action = "<?php echo e(url('/event/price/edit')); ?>" method = "post">
                <?php echo e(csrf_field()); ?>

                <input type = 'hidden' name = 'active_tab' value = 'tab_2_1'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Edit the event price</h4>
                </div>
                <div class="modal-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 230px;">
                        <div class="scroller content-body" style="margin-right:-17px; height: 317px; overflow: scroll; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                            <div class = "row form-group">
                                <div class="col-md-4">
                                    <label for = "price_name">Price name</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id = "price_name" name = "pName">
                                </div>
                            </div>
                            <div class = "row form-group">
                                <div class="col-md-4">
                                    <label for = "price_desc">Price description</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea id = "price_desc" name = "pDesc" placeholder = "Enter price description" rows = "4" cols = "30"></textarea>
                                </div>
                            </div>
                            <div class = "row form-group">
                                <div class="col-md-4">
                                    <label for = "price_cost">Cost</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id = "price_cost" name = "pCost">
                                </div>
                            </div>
                            <div class = "row form-group">
                                <input type="checkbox" id = "price_members_only" name = "pMO">
                                <label for = "price_members_only">Members only</label>
                            </div>
                            <input type = "hidden" id = "price_id" name = "price_id">
                        </div>
                        <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
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