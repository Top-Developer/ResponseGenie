@if ($message = Session::get('members_msg'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<h1 style = "text-align: center;">
    club name : {{ $theClub -> name }}
</h1>
<h2 style = "text-align: center;">
    club description : {{ $theClub -> description }}
</h2>
@if( $theUserRole == 'owner' || $theUserRole == 'admin' )
<div class = "row">
    <div class = "col-md-8">
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn blue btn-outline" data-toggle="modal" href="#invite"> Invite </button>
        </div>
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn green btn-outline" data-toggle="modal" href="#import"> Import </button>
        </div>
        <div class = "col-md-4" style = "text-align: center;">
            <button type="button" class="btn purple btn-outline" id = "member_view_toggle"> Spreadsheet View </button>
        </div>
    </div>
    <div class = "col-md-4 hidden" style = "text-align: center;">
        <button type="button" class="btn dark btn-outline" data-toggle="modal" href="#sel-col"> Select Columns </button>
    </div>
</div>
@endif

<div class = "active">
    @foreach( $onlineMembers as $aUser )
    <div class = "note note-info">
        <div class = "row">
            <div class = "col-md-2">
                @if( $aUser -> profile_image != '')
                    <img src="/{{ $theSCM -> profile_image }}">
                @else
                    <img src="/uploads/images/users/0.png">
                @endif
            </div>
            <div class = "col-md-4">
                <h4>
                    {{ $aUser -> first_name }} {{ $aUser -> last_name }}
                </h4>
                <h4>
                    @if( 'special' == App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description)
                        special
                    @else
                        {{App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description}}
                    @endif
                </h4>
            </div>
            <div class = "col-md-6">
                @if( 'invited' == App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description )
                    <button type="button" class="btn green btn-outline disabled">Invited at {{App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> created_at}}</button>
                    <button type="button" class="btn red btn-outline">Resend Invitation</button>
                @elseif( 'pending' == App\Role::find( App\Roleship::where('user_id', $aUser -> id) -> where('club_id', session('theClubID')) -> firstOrFail() -> role_id ) -> role_description )
                    <button type="button" class="btn green">Approve</button>
                    <button type="button" class="btn red">Deny</button>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    @foreach( $offlineMembers as $aUser )
        <div class = "note note-info">
            <div class = "row">
                <div class = "col-md-2">
                    <img src="/uploads/images/users/0.png">
                </div>
                <div class = "col-md-4">
                    <h4>
                        {{ $aUser -> fname }} {{ $aUser -> lname }}
                    </h4>
                    <h4>
                        offline member
                    </h4>
                </div>
                <div class = "col-md-6">
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class ="hidden">
    <div class="portlet light portlet-fit portlet-datatable " id="form_wizard_1">
        <div class="portlet-title">
            <div class="caption">
                <i class=" icon-layers font-green"></i>
                <span class="caption-subject font-green sbold uppercase"> Memberlist </span>
            </div>
        </div>
        <div class="portlet-body">
            <table class="table table-striped table-bordered table-hover order-column" id="sample_2">
                <thead>
                <tr>
                    <th class= "col-table-admin"> Admin </th>
                    <th class= "col-table-fn"> First Name </th>
                    <th class= "col-table-ln"> Last Name </th>
                    <th class= "col-table-jdate"> Join Date </th>
                    <th class= "col-table-edate"> Expiration Date </th>
                    <th class= "col-table-exp"> Expired </th>
                    {{--<th class= "col-table-city"> City </th>--}}
                    {{--<th class= "col-table-state"> State </th>--}}
                    {{--<th class= "col-table-zcode"> Zipcode </th>--}}
                    {{--<th class= "col-table-phone"> Phone </th>--}}
                    {{--<th class= "col-table-email"> Email </th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach( $onlineMembers as $aUser )
                    <tr>
                        <td class= "col-table-admin">
                            <input type="checkbox" class="checkboxes" disabled>
                        </td>
                        <td class= "col-table-fn">
                            {{$aUser -> first_name}}
                        </td>
                        <td class= "col-table-ln">
                            {{$aUser -> last_name}}
                        </td>
                        <td class= "col-table-jdate">
                            {{$aUser -> join_date}}
                        </td>
                        <td class= "col-table-edate">
                            {{$aUser -> expiration_date}}
                        </td>
                        <td class= "col-table-exp">
                            <input type="checkbox" class="checkboxes" disabled>
                        </td>
                    </tr>
                @endforeach
                @foreach( $offlineMembers as $aUser )
                    <tr>
                        <td class= "col-table-admin">
                            <input type="checkbox" class="checkboxes" disabled>
                        </td>
                        <td class= "col-table-fn">
                            {{$aUser -> fname}}
                        </td>
                        <td class= "col-table-ln">
                            {{$aUser -> lname}}
                        </td>
                        <td class= "col-table-jdate">
                            {{$aUser -> joinDate}}
                        </td>
                        <td class= "col-table-edate">
                            {{$aUser -> expDate}}
                        </td>
                        <td class= "col-table-exp">
                            <input type="checkbox" class="checkboxes" disabled value = '{{Carbon\Carbon::now() -> format("Y-m-d H:i:s")}}' @if(  Carbon\Carbon::now() -> format('Y-m-d H:i:s') > ($aUser -> expDate) ) checked @endif>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>