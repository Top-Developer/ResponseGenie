@if ($message = Session::get('members_msg'))
    <div class="alert alert-danger alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
    </div>
@endif
<h1 style = "text-align: center;">
    event name : {{ $event -> name }}
</h1>
<h2 style = "text-align: center;">
    event description : {{ $event -> description }}
</h2>
@if( $theUserRole == 'owner' || $theUserRole == 'admin' )
    <div class = "row">
        <div class = "col-md-8">
            <div class = "col-md-4" style = "text-align: center;">
                <button type="button" class="btn blue btn-outline" data-toggle="modal" href="#invite"> Invite </button>
            </div>
            <div class = "col-md-4" style = "text-align: center;"></div>
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
    @foreach( $eventMembers as $aUser )
        <div class = "note note-info">
            <div class = "row">
                <div class = "col-md-2">
                    @if( $aUser -> profile_image != '')
                        <img src="/{{ $aUser -> profile_image }}">
                    @else
                        <img src="/uploads/images/users/0.png">
                    @endif
                </div>
                <div class = "col-md-4">
                    <h4>
                        {{ $aUser -> first_name }} {{ $aUser -> last_name }}
                    </h4>
                </div>
                <div class = "col-md-6">
                    @if( '1' == $aUser -> invited )
                        <button type="button" class="btn green btn-outline disabled">Invited at {{ $aUser -> invite_date }}</button>
                        <button type="button" class="btn red btn-outline">Resend Invitation</button>
                    @endif
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
                    <th class= "col-table-jdate"> Invited Date </th>
                    <th class= "col-table-edate"> Accepted Date </th>
                    {{--<th class= "col-table-city"> City </th>--}}
                    {{--<th class= "col-table-state"> State </th>--}}
                    {{--<th class= "col-table-zcode"> Zipcode </th>--}}
                    {{--<th class= "col-table-phone"> Phone </th>--}}
                    {{--<th class= "col-table-email"> Email </th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach( $eventMembers as $aUser )
                    <tr>
                        <td class= "col-table-admin">
                            <input type="checkbox" class="checkboxes" checked disabled>
                        </td>
                        <td class= "col-table-fn">
                            {{$aUser -> first_name}}
                        </td>
                        <td class= "col-table-ln">
                            {{$aUser -> last_name}}
                        </td>
                        <td class= "col-table-jdate">
                            {{$aUser -> invite_date}}
                        </td>
                        <td class= "col-table-edate">
                            {{$aUser -> accept_date}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>