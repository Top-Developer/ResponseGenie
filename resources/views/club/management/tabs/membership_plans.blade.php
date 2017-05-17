<h1 style = "text-align: center;">
    Membership Plans
</h1>
@if( $theUserRole == 'owner' || $theUserRole == 'admin' )
    <div style="float:right;">
        <a type="button" class="btn btn-danger"  data-toggle="modal" href="#add_new_plan"> Add new plan </a>
    </div>
@endif
<div class = "row">

    <div class = "col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-shopping-cart"></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Membership&nbsp;name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </h3>
            </div>
            <div class="panel-body"> Membership description </div>
            <div class="panel-footer"> Membership price </div>
        </div>
    </div>

</div>