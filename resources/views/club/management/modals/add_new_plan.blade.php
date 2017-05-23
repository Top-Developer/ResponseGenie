<div id="add_new_plan" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class = "ajax" action = "{{url('/add/membership_plan')}}" method = "post">
                {{csrf_field()}}
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add new membership plan</h4>
                </div>
                <div class="modal-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
                        <div class="scroller content-body" style="margin-right:-17px; height: 317px; overflow: scroll; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                            <div class = "row form-group">
                                <div class="col-md-4">
                                    <label for = "plan_name">Plan name</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id = "plan_name" name = "pName">
                                </div>
                            </div>
                            <div class = "row form-group">
                                <div class="col-md-4">
                                    <label for = "plan_desc">Plan description</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea id = "plan_desc" name = "pDesc" placeholder = "Enter plan description" rows = "4" cols = "30"></textarea>
                                </div>
                            </div>
                            <div class = "row form-group">
                                <div class="col-md-4">
                                    <label for = "plan_dura">Plan duration</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="text" id = "plan_dura" name = "pDura">
                                </div>
                                <div class="col-md-5">
                                    <select type="text" id = "plan_dura_unit" name = "pDuraUnit">
                                        <option selected>Day(s)</option>
                                        <option>Month(s)</option>
                                        <option>Quater(s)</option>
                                    </select>
                                </div>
                            </div>
                            <div class = "row form-group">
                                <div class="col-md-4">
                                    <label for = "plan_cost">Plan cost</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" id = "plan_cost" name = "pCost">
                                </div>
                            </div>
                            <div class = "row form-group">
                                <input type="checkbox" id = "plan_members_only" name = "pMO">
                                <label for = "plan_members_only">Members only</label>
                            </div>
                            <input type = "hidden" value = "{{$theClub -> id}}" name = "clubId">
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