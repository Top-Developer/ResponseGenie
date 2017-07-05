<h1 style = 'text-align:center;'>{{$theClub -> name}}</h1>
<h2 style = 'text-align:center;'>{{$event -> name}}</h2>
<div class="portlet light portlet-fit portlet-datatable " id="form_wizard_1">
    <div class="portlet-title">
        <div class = 'actions'>
            <a type="button" class="btn btn-danger" data-toggle="modal" href="#sel-trans-cols"> Select Columns </a>
        </div>
    </div>
    <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover order-column" id="dataTb">
            <thead>
            <tr>
                <th class = 'col-table-date'> Date </th>
                <th class = 'col-table-fn'> First Name </th>
                <th class = 'col-table-ln'> Last Name </th>
                <th class = 'col-table-amount'> Amount </th>
                <th class = 'col-table-source'> Source </th>
                <th class = 'col-table-re'> Receipt </th>
            </tr>
            </thead>
            <tbody>
            @foreach($transForEvent as $aTrans)
                <tr>
                    <td class = 'col-table-date'>{{$aTrans -> date}}</td>
                    <td class = 'col-table-fn'>{{$aTrans -> first_name}}</td>
                    <td class = 'col-table-ln'>{{$aTrans -> last_name}}</td>
                    <td class = 'col-table-amount'>{{$aTrans -> amount}}</td>
                    <td class = 'col-table-source'>{{$aTrans -> source}}</td>
                    <td class = 'col-table-re'>{{$aTrans -> receipt}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class = 'row'>
            <div class = 'col-md-6'>
                <a type="button" class="btn purple btn-outline export" download = 'export.csv' id = 'downCSV'> Download CSV </a>
            </div>
            <div class = 'col-md-6' style = 'text-align:right;'>
                <button type="button" class="btn purple btn-outline" data-toggle="modal" href="#event-manual-trans" id = 'emt'>Enter Manual Transactions</button>
            </div>
        </div>
    </div>
    <div class="portlet-footer">
    </div>
</div>