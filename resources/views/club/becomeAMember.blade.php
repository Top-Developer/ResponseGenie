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
                        <h1> Become a member of {{$clubName}} </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
            </div>
            <!-- END PAGE HEAD-->

            <div class="page-content">
                <div class="container">
                    <div class="page-content-inner">
                        <div class="portlet light">
                            <div class="portlet-body tabbable-default">
                                @if($clubType == 'Open Club')
                                    <div class = 'row'>
                                        @foreach($membershipPlans as $theMembership)
                                        <div class = "col-md-4">
                                            <div class="panel panel-info">
                                                <div class="panel-heading" style = 'text-align:center'>
                                                    <span class="panel-title">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name">{{$theMembership -> name}}</span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>${{$theMembership -> cost}}</span>
                                                    </span>
                                                </div>
                                                <div id = 'plan_desc' class = 'panel-body'>{{$theMembership -> description}}</div>
                                                <div class = 'panel-footer' style = 'text-align:right;'>
                                                    <form action="{{url('/club/payForMembership')}}" method="post" style = 'display:inline-block;align:center;'>
                                                        {{csrf_field()}}
                                                        <input type = hidden name = 'plan_id' value = '{{$theMembership -> id}}'>
                                                        <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                data-key = '{{$stripe_public_key}}'
                                                                data-name = '{{$theMembership -> name}}'
                                                                data-description = '{{$theMembership -> description}}'
                                                                data-amount = '{{100 * $theMembership -> cost}}'
                                                                data-currecy = 'usd'
                                                                data-locale = 'auto'>
                                                        </script>
                                                    </form>
                                                </div>
                                                <div id = 'plan_dura' class = 'hidden'>{{$theMembership -> duration_quantity}}</div>
                                                <div id = 'plan_dura_unit' class = 'hidden'>{{$theMembership -> duration_unit}}</div>
                                                <div id = 'plan_is_for_mem' class = 'hidden'>{{$theMembership -> is_for_members_only}}</div>
                                                <div id = 'plan_id' class = 'hidden'>{{$theMembership -> id}}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                    </div>
                                @elseif($clubType == 'Privated Club')
                                    @if($role == 'invited')
                                        <div class = 'row'>
                                            @foreach($membershipPlans as $theMembership)
                                                <div class = "col-md-4">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading" style = 'text-align:center'>
                                                    <span class="panel-title">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name">{{$theMembership -> name}}</span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>${{$theMembership -> cost}}</span>
                                                    </span>
                                                        </div>
                                                        <div id = 'plan_desc' class = 'panel-body'>{{$theMembership -> description}}</div>
                                                        <div class = 'panel-footer' style = 'text-align:right;'>
                                                            <form action="{{url('/club/payForMembership')}}" method="post" style = 'display:inline-block;align:center;'>
                                                                {{csrf_field()}}
                                                                <input type = hidden name = 'plan_id' value = '{{$theMembership -> id}}'>
                                                                <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                        data-key = '{{$stripe_public_key}}'
                                                                        data-name = '{{$theMembership -> name}}'
                                                                        data-description = '{{$theMembership -> description}}'
                                                                        data-amount = '{{100 * $theMembership -> cost}}'
                                                                        data-currecy = 'usd'
                                                                        data-locale = 'auto'>
                                                                </script>
                                                            </form>
                                                        </div>
                                                        <div id = 'plan_dura' class = 'hidden'>{{$theMembership -> duration_quantity}}</div>
                                                        <div id = 'plan_dura_unit' class = 'hidden'>{{$theMembership -> duration_unit}}</div>
                                                        <div id = 'plan_is_for_mem' class = 'hidden'>{{$theMembership -> is_for_members_only}}</div>
                                                        <div id = 'plan_id' class = 'hidden'>{{$theMembership -> id}}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <div class = 'row'>
                                            You can not be a member of {{$clubName}} unless you are invited to the club.
                                        </div>
                                    @endif
                                @elseif($clubType == 'Moderated Club')
                                    @if($role == 'invited')
                                        <div class = 'row'>
                                            @foreach($membershipPlans as $theMembership)
                                                <div class = "col-md-4">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading" style = 'text-align:center'>
                                                    <span class="panel-title">
                                                        <i class="fa fa-shopping-cart"></i>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = "plan_name">{{$theMembership -> name}}</span>
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span id = 'plan_cost'>${{$theMembership -> cost}}</span>
                                                    </span>
                                                        </div>
                                                        <div id = 'plan_desc' class = 'panel-body'>{{$theMembership -> description}}</div>
                                                        <div class = 'panel-footer' style = 'text-align:right;'>
                                                            <form action="{{url('/club/payForMembership')}}" method="post" style = 'display:inline-block;align:center;'>
                                                                {{csrf_field()}}
                                                                <input type = hidden name = 'plan_id' value = '{{$theMembership -> id}}'>
                                                                <script src = 'https://checkout.stripe.com/checkout.js' class = 'stripe-button'
                                                                        data-key = '{{$stripe_public_key}}'
                                                                        data-name = '{{$theMembership -> name}}'
                                                                        data-description = '{{$theMembership -> description}}'
                                                                        data-amount = '{{100 * $theMembership -> cost}}'
                                                                        data-currecy = 'usd'
                                                                        data-locale = 'auto'>
                                                                </script>
                                                            </form>
                                                        </div>
                                                        <div id = 'plan_dura' class = 'hidden'>{{$theMembership -> duration_quantity}}</div>
                                                        <div id = 'plan_dura_unit' class = 'hidden'>{{$theMembership -> duration_unit}}</div>
                                                        <div id = 'plan_is_for_mem' class = 'hidden'>{{$theMembership -> is_for_members_only}}</div>
                                                        <div id = 'plan_id' class = 'hidden'>{{$theMembership -> id}}</div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @elseif($role == 'pending')
                                        <form method = 'post' action = '{{url("/club/request")}}'>
                                            {{csrf_field()}}
                                            <div class = 'row'>
                                                You already sent request to become a member of {{$clubName}}.
                                                If you want to resend request, click the btton below.
                                            </div>
                                            <div class = 'row' style = 'text-align: right;'>
                                                <button type = 'submit' class="btn red">Resend request</button>
                                            </div>
                                        </form>
                                    @else
                                        <form method = 'post' action = '{{url("/club/request")}}'>
                                            {{csrf_field()}}
                                            <div class = 'row'>
                                                You can request to become a member of {{$clubName}} by clicking the following button.
                                                If the admin allows, you can pay and get a membership.
                                            </div>
                                            <div class = 'row' style = 'text-align: right;'>
                                                <button type = 'submit' class="btn red">Request to be a member</button>
                                            </div>
                                        </form>
                                    @endif
                                @elseif($clubType == 'Closed Club')
                                    <div class = 'row'>
                                        You can not be a member of {{$clubName}} because the club is closed club.
                                    </div>
                                @else
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