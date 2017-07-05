<div id="edit_contact_info" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action = "{{url('event/contact/edit')}}" method = "post">
                {{csrf_field()}}
                <input type = 'hidden' name = 'active_tab' value = 'tab_2_1'>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Event contact info</h4>
                </div>
                <div class="modal-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
                        <div class="scroller" style="margin-right:-17px; height: 317px; overflow: scroll; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                            <div class = "row">
                                <div class = "col-xs-12">
                                    <input id = "use_club" type = "checkbox" name = "use_club">
                                    <label for = "use_club">Use club contact information</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <h4 style="text-align:center;">Meeting Location</h4>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "city">City</label>
                                            <input type="text" id = "city" name = "city" class="col-md-12" value = "{{$theContact -> city}}">
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "state">State</label>
                                            <input type="text" id = "state" name = "state" class="col-md-12" value = "{{$theContact -> state}}">
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "zcod">Zipcode</label>
                                            <input type="text" id = "zcod" name = "zipcode" class="col-md-12" value = "{{$theContact -> zipcode}}">
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <div id="gmap_contact" class="gmaps"></div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "">Primary Contact</label>
                                            <select name = "pcmid">
                                                <option>None</option>
                                                @foreach( $eventMembers as $aUser )
                                                    <option value = "{{$aUser -> id}}" @if( $theContact -> pcm_id == $aUser -> id ) selected @endif>{{$aUser -> email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "zcod">Secondary Contact</label>
                                            <select name = "scmid">
                                                <option>None</option>
                                                @foreach( $eventMembers as $aUser )
                                                    <option value = "{{$aUser -> id}}" @if( $theContact -> scm_id == $aUser -> id ) selected @endif>{{$aUser -> email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-linkedin tooltips col-md-1" data-original-title="Linkedin"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "inLink" class="col-md-6 form-control" value = "{{$theContact ->linkedin}}">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "inLevel" class="col-md-5 form-control">
                                                <option @if($theContact -> level_in == 'Public'){{'selected'}}@endif>Public</option>
                                                <option @if($theContact -> level_in == 'Members Only'){{'selected'}}@endif>Members Only</option>
                                                <option @if($theContact -> level_in == 'Private'){{'selected'}}@endif>Private</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-twitter tooltips col-md-1" data-original-title="Twitter"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "ttLink" class="col-md-6 form-control" value = "{{$theContact -> twitter}}">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "ttLevel" class="col-md-5 form-control">
                                                <option @if($theContact -> level_t == 'Public'){{'selected'}}@endif>Public</option>
                                                <option @if($theContact -> level_t == 'Members Only'){{'selected'}}@endif>Members Only</option>
                                                <option @if($theContact -> level_t == 'Private'){{'selected'}}@endif>Private</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-facebook tooltips col-md-1" data-original-title="Facebook"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "fbLink" class="col-md-6 form-control" value = "{{$theContact -> facebook}}">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "fbLevel" class="col-md-5 form-control">
                                                <option @if($theContact -> level_f == 'Public'){{'selected'}}@endif>Public</option>
                                                <option @if($theContact -> level_f == 'Members Only'){{'selected'}}@endif>Members Only</option>
                                                <option @if($theContact -> level_f == 'Private'){{'selected'}}@endif>Private</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-youtube tooltips col-md-1" data-original-title="Youtube"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "ytLink" class="col-md-6 form-control" value = "{{$theContact -> youtube}}">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "ytLevel" class="col-md-5 form-control">
                                                <option @if($theContact -> level_y == 'Public'){{'selected'}}@endif>Public</option>
                                                <option @if($theContact -> level_y == 'Members Only'){{'selected'}}@endif>Members Only</option>
                                                <option @if($theContact -> level_y == 'Private'){{'selected'}}@endif>Private</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-google tooltips col-md-1" data-original-title="Google"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "goLink" class="col-md-6 form-control" value = "{{$theContact -> googleplus}}">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "goLevel" class="col-md-5 form-control">
                                                <option @if($theContact -> level_g == 'Public'){{'selected'}}@endif>Public</option>
                                                <option @if($theContact -> level_g == 'Members Only'){{'selected'}}@endif>Members Only</option>
                                                <option @if($theContact -> level_g == 'Private'){{'selected'}}@endif>Private</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-mail tooltips col-md-1" data-original-title="Mail"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "maLink" class="col-md-6 form-control" value = "{{$theContact -> mail}}">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "maLevel" class="col-md-5 form-control">
                                                <option @if($theContact -> level_m == 'Public'){{'selected'}}@endif>Public</option>
                                                <option @if($theContact -> level_m == 'Members Only'){{'selected'}}@endif>Members Only</option>
                                                <option @if($theContact -> level_m == 'Private'){{'selected'}}@endif>Private</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <button type="submit" class="btn green">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>