<div class="row">
    <div class="col-md-8">
        <!-- BEGIN PORTLET-->
        <div class="portlet light portlet-fit  calendar">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-blue sbold uppercase">Calendar</span>
                </div>
            </div>
            <div class="portlet-body">
                <div id="calendar" class="has-toolbar"> </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>

    <div class="col-md-4">
        <div class="portlet light portlet-fit">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-blue"></i>
                    <span class="caption-subject font-blue sbold uppercase">Events</span>
                </div>
                @if( $theUserRole == 'owner' || $theUserRole == 'admin' )
                <div style="float:right;">
                    <a href="{{url('/'.$theClub -> slug.'/create-an-event')}}" class="btn red"> Create a new event </a>
                </div>
                @endif
            </div>

            <div class="portlet-body">
                @foreach($clubEvents as $anEvent)
                <div class="row eventcontainer">
                    <div class="col-md-3 text-center monthdate">
                        <span class="date">{{$anEvent->start_date}}</span>
                    </div>
                    <div class="col-md-9">
                        <span class="small mb-10 text-muted">{{$anEvent->name}}</span>
                        <h6 class="title">{{$anEvent->description}}</h6>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <!-- End Portlet -->
    </div>
</div>