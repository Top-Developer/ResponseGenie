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
                <th> Created Date </th>
                <th> Name </th>
                <th> Amount </th>
                <th> Applied to </th>
                <th> Uses </th>
                <th> Expires </th>
            </tr>
            </thead>
            <tbody>
            @foreach( $discounts as $aDiscount )
                <tr>
                    <td>
                        {{$aDiscount -> created_at}}
                    </td>
                    <td>
                        {{$aDiscount -> name}}
                    </td>
                    <td>
                        {{$aDiscount -> amount}}
                    </td>
                    <td>
                        @if( $aDiscount -> applyTo == 'existing' )
                            Existing Members
                        @elseif( $aDiscount -> applyTo == 'new' )
                            New members
                        @elseif( $aDiscount -> applyTo == 'selected' )
                            Selected Members
                        @elseif( $aDiscount -> applyTo == 'everyone' )
                            Everyone
                        @endif
                    </td>
                    <td>
                        {{$aDiscount -> uses}}
                    </td>
                    <td>
                        {{$aDiscount -> expDate}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

