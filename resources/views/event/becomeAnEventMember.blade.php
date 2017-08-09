@extends('layouts.hometemplate')

@section('title')
    Become A Member
@endsection

@push('asset')
@endpush

@section('content')
    @if ($message = Session::get('msg'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif
    <div class="page-container">
        <div class="page-content-wrapper">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1> Become a member of {{$eventName}} </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
            </div>
            <!-- END PAGE HEAD-->

            <div class="page-content">
                <div class="container">
                    <div class="page-content-inner">
                        <div class="portlet light">
                            <div class="portlet-body table-default">
                                @if( $count == 0 )
                                    You can not join this event because the event has not any price yet.
                                @else
                                    @foreach($eventPrices as $eventPrice)
                                        @if($eventType == 'Public')
                                            @if(0==$eventPrice->members_only||(1==$eventPrice->members_only&&$isMember)||(1==$eventPrice->members_only&&$isInvited))
                                                <div class = 'row'>
                                                    <div class = "col-md-4">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading" style = 'text-align:center'>
                                                            <span class="panel-title">
                                                                <i class="fa fa-shopping-cart"></i>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name">{{$eventPrice->name}}</span>
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                @if( 0 == $eventPrice->cost )
                                                                    Free
                                                                @else
                                                                    <span id = 'plan_cost'>${{$eventPrice->cost}}</span>
                                                                @endif
                                                            </span>
                                                            </div>
                                                            <div id = 'plan_desc' class = 'panel-body'>{{$eventPrice->description}}</div>
                                                            <div class = 'panel-footer' style = 'text-align:right;'>
                                                                @if( 0 == $eventPrice->cost )
                                                                    <form action="{{url('events/'.$eventSlug.'/payForEventMembership')}}" method="post" style = 'display:inline-block;align:center;'>
                                                                        {{csrf_field()}}
                                                                        <input type = hidden name = 'ePrice_id' value = '{{$eventPrice->id}}'>
                                                                        <button type="submit" class="stripe-button-el" style="visibility: visible;">
                                                                    <span style="display: block; min-height: 30px;">
                                                                        Join
                                                                    </span>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <form action="{{url('events/'.$eventSlug.'/payForEventMembership')}}" method="post" style = 'display:inline-block;align:center;'>
                                                                        {{csrf_field()}}
                                                                        <input type = hidden name = 'ePrice_id' value = '{{$eventPrice->id}}'>
                                                                        <script src = '{{'https://checkout.stripe.com/checkout.js'}}' class = 'stripe-button'
                                                                                data-key = '{{$stripe_public_key}}'
                                                                                data-name = '{{$eventPrice->name}}'
                                                                                data-description = '{{$eventPrice->description}}'
                                                                                data-amount = '{{100*$eventPrice->cost}}'
                                                                                data-currency = 'usd'
                                                                                data-locale = 'auto'>
                                                                        </script>
                                                                    </form>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif($eventType == 'Members Only')
                                            @if($isMember||$isInvited)
                                                <div class = 'row'>
                                                    <div class = "col-md-4">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading" style = 'text-align:center'>
                                                        <span class="panel-title">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name">{{$eventPrice->name}}</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>${{$eventPrice->cost}}</span>
                                                        </span>
                                                            </div>
                                                            <div id = 'plan_desc' class = 'panel-body'>{{$eventPrice->description}}</div>
                                                            <div class = 'panel-footer' style = 'text-align:right;'>
                                                                <form action="{{url('events/'.$eventSlug.'/payForEventMembership')}}" method="post" style = 'display:inline-block;align:center;'>
                                                                    {{csrf_field()}}
                                                                    <input type = hidden name = 'ePrice_id' value = '{{$eventPrice->id}}'>
                                                                    <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                            data-key = '{{$stripe_public_key}}'
                                                                            data-name = '{{$eventPrice->name}}'
                                                                            data-description = '{{$eventPrice->description}}'
                                                                            data-amount = '{{100 * $eventPrice->cost}}'
                                                                            data-currency = 'usd'
                                                                            data-locale = 'auto'>
                                                                    </script>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @elseif($eventType == 'Invite Only')
                                            @if($isInvited)
                                                <div class = 'row'>
                                                    <div class = "col-md-4">
                                                        <div class="panel panel-info">
                                                            <div class="panel-heading" style = 'text-align:center'>
                                                        <span class="panel-title">
                                                            <i class="fa fa-shopping-cart"></i>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name">{{$eventPrice -> name}}</span>
                                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>${{$eventPrice -> cost}}</span>
                                                        </span>
                                                            </div>
                                                            <div id = 'plan_desc' class = 'panel-body'>{{$eventPrice -> description}}</div>
                                                            <div class = 'panel-footer' style = 'text-align:right;'>
                                                                <form action="{{url('/club/payForMembership')}}" method="post" style = 'display:inline-block;align:center;'>
                                                                    {{csrf_field()}}
                                                                    <input type = hidden name = 'ePrice_id' value = '{{$eventPrice->id}}'>
                                                                    <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                            data-key = '{{$stripe_public_key}}'
                                                                            data-name = '{{$eventPrice -> name}}'
                                                                            data-description = '{{$eventPrice -> description}}'
                                                                            data-amount = '{{100 * $eventPrice -> cost}}'
                                                                            data-currency = 'usd'
                                                                            data-locale = 'auto'>
                                                                    </script>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
@endpush