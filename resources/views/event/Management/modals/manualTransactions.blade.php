<div class="modal fade" id="event-manual-trans" tabindex="-1" role="basic" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method = 'post' action = '{{url("/event/manual_transaction")}}' id = 'mtForm'>
                {{csrf_field()}}
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
                                @foreach($eventMembers as $aUser)
                                    <option value = 'online:{{$aUser -> id}}'>{{$aUser -> first_name}} {{$aUser -> last_name}}</option>
                                @endforeach
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
                                @foreach($eventPrices as $ePrice)
                                    <option value = ':{{$ePrice -> id}}'>{{$ePrice -> name}}</option>
                                @endforeach
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