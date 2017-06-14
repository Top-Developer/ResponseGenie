<h1 style = 'text-align:center;'>Discounts</h1>
<div class="portlet light portlet-fit portlet-datatable " id="form_wizard_1">
    <div class="portlet-title">
        <div class = 'actions'>
            <a type="button" class="btn btn-danger" data-toggle="modal" href="#add_discount"> New discount </a>
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
            </tr>
            </thead>
            <tbody>
            @foreach( $onlineMembers as $aUser )
                <tr>
                    <td class= "col-table-admin">
                        <input type="checkbox" class="checkboxes" disabled @if($aUser -> role_description == 'owner' || $aUser -> role_description == 'admin') checked @endif>
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
                        <input type="checkbox" class="checkboxes" disabled @if($aUser -> expiration_date == 'owner' || $aUser -> role_description == 'admin') checked @endif>
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

