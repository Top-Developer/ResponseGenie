<h1 style = "text-align: center;">
    Membership Plans
    @if( $theUserRole == 'owner' || $theUserRole == 'admin' )
        <div style="float:right;">
            <a type="button" class="btn btn-danger" data-toggle="modal" href="#add_new_plan"> Add new plan </a>
        </div>
    @endif
</h1>
<div class = "row">
    @foreach($theClub -> membership_plans as $theMembership)
    <div class = "col-md-4">
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-shopping-cart"></i>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class = "plan_name">{{$theMembership -> name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" class="btn red-mint btn-outline sbold" data-toggle="modal" href="#edit_plan">Edit</a>
                </h3>
            </div>
            <div class="panel-body"> {{$theMembership -> description}} </div>
            <div class="panel-footer"> {{$theMembership -> cost}} </div>
            <div id = "plan_dura"> {{$theMembership -> cost}} </div>
            <div class="panel-footer"> {{$theMembership -> cost}} </div>
        </div>
    </div>
    @endforeach
</div>