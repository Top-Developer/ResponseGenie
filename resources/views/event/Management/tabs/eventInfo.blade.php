<div class="note note-info">
    <h4 style="text-align:center;">Event Name : {{$event -> name}}</h4>
    <div class="row">
        <div class = "col-md-6">
            <img src="{{$event -> logo_path}}" class="card-body-image">
        </div>
        <div class = "col-md-6">
            <div>
                Event Description :<br>{{ $event -> description }}
            </div>
        </div>
    </div>
</div>
<h1 style="text-align: center;">
    Event Prices
    @if( $theUserRole == 'owner' || $theUserRole == 'admin' )
        <div style="float:right;">
            <a type="button" class="btn btn-danger" data-toggle="modal" href="#add_event_price"> Add event price </a>
        </div>
    @endif
</h1>
<div class = "row">
    @if(!is_null($isAlreadyEventMember) && $theUserRole != 'owner' && $theUserRole != 'admin')
        You are already a member of this event.
    @else
        @foreach($eventPrices as $anEventPrice)
            <div class = "col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <i class="fa fa-shopping-cart"></i>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "price_name">{{$anEventPrice -> name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            @if( $theUserRole == 'owner' || $theUserRole == 'admin' )
                                <a type="button" class="btn red-mint btn-outline sbold" data-toggle="modal" href="#edit_event_price">Edit</a>
                            @endif
                        </h3>
                    </div>
                    <div id = 'price_desc' class = 'panel-body'>{{$anEventPrice -> description}}</div>
                    <div class = 'panel-footer'>
                        <div id ='price_cost'>
                            @if( 0 == $anEventPrice -> cost )
                                Free
                            @else
                                ${{$anEventPrice -> cost}}
                            @endif
                        </div>
                        @if( $theUserRole != 'owner' && $theUserRole != 'admin' )
                        <div>
                            @if( 0 != $anEventPrice -> cost )
                                <form action="{{url('/event/payForEvent')}}" method="post" style = 'display:inline-block;align:center;'>
                                    {{csrf_field()}}
                                    <input type = hidden name = 'ePrice_id' value = '{{$anEventPrice -> id}}'>
                                    <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                            data-key = '{{$stripe_public_key}}'
                                            data-name = '{{$anEventPrice -> name}}'
                                            data-description = '{{$anEventPrice -> description}}'
                                            data-amount = '{{100 * $anEventPrice -> cost}}'
                                            data-currency = 'usd'
                                            data-locale = 'auto'>
                                    </script>
                                </form>
                            @else
                                <form action="{{url('/event/payForEvent')}}" method="post" style = 'display:inline-block;align:center;'>
                                    <button type="submit" class="stripe-button-el" style="visibility: visible;">
                                        <span style="display: block; min-height: 30px;">
                                            RSVP
                                        </span>
                                    </button>
                                </form>
                            @endif
                        </div>
                        @endif
                    </div>
                    <div id = 'price_is_for_mem' class = 'hidden'>{{$anEventPrice -> members_only}}</div>
                    <div id = 'price_id' class = 'hidden'>{{$anEventPrice -> id}}</div>
                </div>
            </div>
        @endforeach
    @endif
</div>
<div class="note note-info">
    <div class = "row">
        @if( $theUserRole == 'owner' || $theUserRole == 'admin' )
            <div style="float:right;">
                <a type="button" class="btn btn-danger"  data-toggle="modal" href="#edit_contact_info"> Edit contact information </a>
            </div>
        @endif
        <h3 style="text-align:center;">Location and Contact Information</h3>
    </div>
    <div class="row">
        <div class="col-md-1">
            @if( ($theContact -> level_in != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> linkedin != '')
                <a target='_blank' href="{{$theContact -> linkedin}}" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-green bg-hover-grey-salsa font-white bg-hover-white socicon-linkedin tooltips" data-original-title="Linkedin"></a><br>
            @endif
            @if( ($theContact -> level_t != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> twitter != '' )
                <a target='_blank' href="{{$theContact -> twitter}}" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-blue bg-hover-grey-salsa font-white bg-hover-white socicon-twitter tooltips" data-original-title="Twitter"></a><br>
            @endif
            @if( ($theContact -> level_f != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> facebook != '')
                <a target='_blank' href="{{$theContact -> facebook}}" class="socicon-btn socicon-sm socicon-btn-circle socicon-solid bg-red font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a><br>
            @endif
            @if( ($theContact -> level_y != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> youtube != '')
                <a target='_blank' href="{{$theContact -> youtube}}" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-green bg-hover-grey-salsa font-white bg-hover-white socicon-youtube tooltips" data-original-title="Youtube"></a><br>
            @endif
            @if( ($theContact -> level_g != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> googleplus != '')
                <a target='_blank' href="{{$theContact -> googleplus}}" class="socicon-btn socicon-btn-circle socicon-sm socicon-solid bg-blue bg-hover-grey-salsa font-white bg-hover-white socicon-google tooltips" data-original-title="Google"></a><br>
            @endif
            @if( ($theContact -> level_m != 'Private' ||  $theUserRole == 'owner' || $theUserRole == 'admin') && $theContact -> mail != '')
                <a target='_blank' href="{{$theContact -> mail}}" class="socicon-btn socicon-sm socicon-btn-circle socicon-solid bg-red font-white bg-hover-grey-salsa socicon-mail tooltips" data-original-title="Mail"></a>
            @endif
        </div>
        <div class="col-md-3">
            <div id="gmap_contact" class="gmaps"> </div>
        </div>
        <div class="col-md-3">
            <h3>City : {{ $theContact -> city }}</h3><br>
            <h3>State : {{ $theContact -> state }}</h3><br>
            <h3>Country : {{ $theContact -> country }}</h3><br>
            <h3>Zipcode : {{ $theContact -> zipcode }}</h3>
        </div>
        @if( $thePCM || $theSCM )
            <div class="col-md-5">
                @if($thePCM)
                    <div class = "row">
                        <div class = "col-md-4 contact-member">
                            @if( $thePCM -> profile_image != '')
                                <img src="/../storage/app/{{ $thePCM -> profile_image }}">
                            @else
                                <img src="/uploads/images/users/0.png">
                            @endif
                        </div>
                        <div class = "col-md-8">
                            <h4>
                                {{$thePCM -> first_name}} {{$thePCM -> last_name}}
                            </h4>
                            <h4>
                                {{$thePCMRole}}
                            </h4>
                            <h4>
                                {{$thePCM -> email}}
                            </h4>
                        </div>
                    </div>
                @endif
                @if($theSCM)
                    <div class = "row">
                        <div class = "col-md-4 contact-member">
                            @if( $theSCM -> profile_image != '')
                                <img src="/{{ $theSCM -> profile_image }}">
                            @else
                                <img src="/uploads/images/users/0.png">
                            @endif
                        </div>
                        <div class = "col-md-8">
                            <h4>
                                {{$theSCM -> first_name}} {{$theSCM -> last_name}}
                            </h4>
                            <h4>
                                {{$theSCMRole}}
                            </h4>
                            <h4>
                                {{$theSCM -> email}}
                            </h4>
                        </div>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>