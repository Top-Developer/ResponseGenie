@extends('layouts.hometemplate')

@section('title')
    Configure  your club
@endsection

@push('asset')


<style>
    .club-body {
        display: flex;
        margin: 20px;
        padding: 30px;
        border: 1px solid #eee;
    }

    .club-image {
        width: 10%;
    }

    .club-image img {
        width: 100px;
        height: 100px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .club-description {
        width: 90%;
        padding-left: 40px;
        font-size: 18px;
    }

    .event-item {
        display: flex;
        width: 100%;
        margin-top: 10px;
        border-bottom: 1px solid #eee;
        border-left: 4px solid #00A8FF;
        background-color: #e9f1f5;
    }

    .event-item-calendar {
        width: 20%;
        text-align: center;
    }

    .event-item-body {
        width: 80%;
        padding-left: 20px;
    }

    .event-item-month {
        font-size: 20px;
        font-weight: 800;
        color: #00A0D1;
    }

    .event-item-date {
        font-size: 17px;
        font-weight: 600;
    }

    .section {
        margin: 20px;
        padding: 20px;
        border-top: 1px solid #ccc;
    }

    .social-box {
        display: block;
        width: 30%;
    }

    .imagebox_footer {
        bottom: 0px;
        width: 100%;
        text-align: center;
        padding: 12px;
        color:white;
    }

    .admin {
        background: rgba(0,0,0,0.85);
    }

    .member {
        background: rgba(0,0,0,0.7);
    }

    .invited {
        background: rgba(0,0,0,0.5);
    }

    .invite-accept {
        position: absolute;
        right: -5px;
        bottom: 0px;
        vertical-align: middle;
        padding: 5px 20px;
        background: darkmagenta;
        text-decoration: none;
    }

    .eventcontainer {
        border-left: 5px solid #afe;
        background: honeydew;
        padding: 4px;
        margin-bottom: 5px;
    }

    .monthdate {
        font-weight: 900;
        color: #f3565d;
        text-align: center;
    }

    .plan-box {
        max-width: 350px;
        border: 1px solid rgba(205, 227, 241, 0.74);
    }

    .plan-header {
        background: rgb(3, 153, 221);
        padding: 20px 20px;
        margin: 0;
        text-align: center;
    }

    .no-margin {
        color: white;
        font-family: "Open Sans",sans-serif;
        font-weight: 400;
    }

    .arrow-down {
        width: 0;
        height: 0;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-top: 15px solid;
        margin: auto;

        border-top-color: rgb(3, 153, 221)!important;

    }

    .plan-body h3{
        font-size: 60px;
        font-weight: 500;
        color: rgb(3, 153, 221);
        position: relative;
    }

    .price-sign {
        font-size: 24px;
        position: absolute;
        margin-left: -15px;
    }

    .plan-edit-tool {
        position: absolute;
        right: 25px;
        top: 10px;
        color: white;
        font-size: 20px;
    }

    .avatar {
        width: 100%;
        border: 1px solid transparent;
        border-radius: 5px !important;
    }

    .adminbadge {
        width: 20px;
        display: inline-block;
        position: absolute;
    }

    .row-even {
        background-color: rgba(128, 190, 245, 0.12);
    }

    #member-spreadsheet-view {
        display: none;
    }


    #clublogo {
        position: absolute;
        left: 0;
        top: 0;
        display: inline-block;
        width: 300px;
        height: 300px;
        opacity: 0;
    }
    .img-preview {
        display: inline-block;
        width:100%;
        height: 100%;
        max-width: 300px;
        max-height: 300px;
        padding: 4px;
        border: 1px dashed #00af8e;
    }

    .section {
        padding: 40px 20px;
    }
</style>
@endpush


@section('content')
<div class="page-container">
    <div class="page-content-wrapper">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <div class="container">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1>Club configuration
                        <small>members & configuration</small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->

                <div class="page-toolbar">
                    <!-- BEGIN THEME PANEL -->
                    <div class="btn-group btn-theme-panel">
                        <a href="{{url('/createclub')}}" class="btn blue">
                            Create New Club
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PAGE HEAD-->

        <!-- END PAGE HEAD-->
        <div class="page-content">
            <div class="container">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <a href="/">Home</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <a href="{{url('/club/myclub')}}">Clubs</a>
                        <i class="fa fa-circle"></i>
                    </li>
                    <li>
                        <span>Configuration</span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMBS -->


                <div class="page-content-inner">
                    <div class="row">
                        <div class="col-md-12">

                            @if(Session::has('message'))
                                <div class="alert alert-{{ Session::get('status') }} status-box">
                                    <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            <div class="tabbable-custom nav-justified">
                                <ul class="nav nav-tabs nav-justified">
                                    <li class="active">
                                        <a href="#tab_1_1_1" data-toggle="tab" aria-expanded="true"> Club Information </a>
                                    </li>
                                    <li class="">
                                        <a href="#tab_1_1_2" data-toggle="tab" aria-expanded="false"> Members </a>
                                    </li>
                                    <li class="">
                                        <a href="#tab_1_1_3" data-toggle="tab" aria-expanded="false"> Configure Club </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1_1_1">

                                        <h2 class="space-top page-title text-center"> Club Information </h2>

                                        <div class="club-body">
                                            <div class="club-image">
                                                <img src="/{{$club->club_logo}}" style="border: 1px solid transparent; border-radius: 10px !important;">
                                            </div>
                                            <div class="club-description">
                                                <p>
                                                    {{$club->club_description}}
                                                </p>
                                            </div>
                                        </div>

                                        <!-- Start Calendar-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="portlet light portlet-fit  calendar">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class=" icon-layers font-green"></i>
                                                            <span class="caption-subject font-green sbold uppercase">Calendar</span>
                                                        </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-12">
                                                                <!-- BEGIN DRAGGABLE EVENTS PORTLET-->
                                                                <h3 class="event-form-title margin-bottom-20">Draggable Events</h3>
                                                                <div id="external-events">
                                                                    <form class="inline-form">
                                                                        <input type="text" value="" class="form-control" placeholder="Event Title..." id="event_title" />
                                                                        <br/>
                                                                        <a href="javascript:;" id="event_add" class="btn green"> Add Event </a>
                                                                    </form>
                                                                    <hr/>
                                                                    <div id="event_box" class="margin-bottom-10"></div>
                                                                    <label for="drop-remove">
                                                                        <input type="checkbox" id="drop-remove" />remove after drop </label>
                                                                    <hr class="visible-xs" />
                                                                </div>
                                                                <!-- END DRAGGABLE EVENTS PORTLET-->

                                                                <div class="event-item">
                                                                    <div class="event-item-calendar">
                                                                        <span class="event-item-month">
                                                                            May
                                                                        </span>
                                                                        <span class="event-item-date">
                                                                            18
                                                                        </span>
                                                                    </div>
                                                                    <div class="event-item-body">
                                                                        <h5> Meeting </h5>
                                                                    </div>
                                                                </div>

                                                                <div class="event-item">
                                                                    <div class="event-item-calendar">
                                                                        <span class="event-item-month">
                                                                            May
                                                                        </span>
                                                                        <span class="event-item-date">
                                                                            26
                                                                        </span>
                                                                    </div>
                                                                    <div class="event-item-body">
                                                                        <h5> Meeting </h5>
                                                                    </div>
                                                                </div>

                                                                <div class="event-item">
                                                                    <div class="event-item-calendar">
                                                                        <span class="event-item-month">
                                                                            May
                                                                        </span>
                                                                        <span class="event-item-date">
                                                                            29
                                                                        </span>
                                                                    </div>
                                                                    <div class="event-item-body">
                                                                        <h5> Meeting </h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-9 col-sm-12">
                                                                <div id="calendar" class="has-toolbar"> </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Calendar-->

                                        <div class="section">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if(isset($is_admin) && $is_admin == 1)
                                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" style="display: block">Edit club contact info</button>
                                                    @endif
                                                </div>
                                            </div>

                                            <h2 class="space-top page-title text-center"> Location and contact information </h2>

                                            <div class="row">
                                                <div class="col-md-3">


                                                    <div class="social-box">
                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <img src="/img/social/linkedin.png">
                                                                </td>
                                                                <td>
                                                                    <img src="/img/social/twitter.png">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="/img/social/globe.png">
                                                                </td>
                                                                <td>
                                                                    <img src="/img/social/facebook.png">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    <img src="/img/social/youtube.png">
                                                                </td>
                                                                <td>
                                                                    <img src="/img/social/mailbox.png">
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <!-- BEGIN GEOCODING PORTLET-->
                                                    <div class="portlet light portlet-fit ">
                                                        <div class="portlet-title">
                                                            <div class="caption">
                                                                <i class=" icon-layers font-green"></i>
                                                                <span class="caption-subject font-green bold uppercase">Geocoding</span>
                                                            </div>
                                                            <div class="actions">
                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                    <i class="icon-cloud-upload"></i>
                                                                </a>
                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                    <i class="icon-wrench"></i>
                                                                </a>
                                                                <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                                                    <i class="icon-trash"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="portlet-body">
                                                            <form class="form-inline margin-bottom-10" action="#">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" id="gmap_geocoding_address" placeholder="address...">
                                                                    <span class="input-group-btn">
                                                                        <button class="btn blue" id="gmap_geocoding_btn">
                                                                            <i class="fa fa-search"></i>
                                                                        </button>
                                                                    </span>
                                                                </div>
                                                            </form>
                                                            <div id="gmap_geocoding" class="gmaps"> </div>
                                                        </div>
                                                    </div>
                                                    <!-- END GEOCODING PORTLET-->
                                                </div>
                                            </div>

                                        </div>

                                        <div class="section">

                                            <div class="row">
                                                <div class="col-md-12">
                                                    @if(isset($is_admin) && $is_admin == 1)
                                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal" >Add new plan</button>
                                                    @endif
                                                </div>
                                            </div>
                                            <!-- Membership plans -->

                                            <h2 class="space-top page-title text-center">Membership Plans</h2>

                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-20 bordered shadow text-center light-gray-bg plan-box">
                                                        <div class="plan-header">
                                                            <h3 class="no-margin"><i class="fa fa-shopping-cart">&nbsp;</i>Annual Membership</h3>
                                                            @if(isset($is_admin) && $is_admin == 1)
                                                            <a class="plan-edit-tool"><i class="fa fa-pencil-square-o"></i></a>
                                                            @endif
                                                        </div>
                                                        <div class="arrow-down border-top-blue"></div>

                                                        <div class="plan-body">
                                                            <h3>
                                                                <span class="price-sign">$</span>45
                                                            </h3>
                                                        </div>

                                                        <div class="plan-footer">
                                                            <p>Anual Membership lasts for 1 calendar year.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="mb-20 bordered shadow text-center light-gray-bg plan-box">
                                                        <div class="plan-header">
                                                            <h3 class="no-margin"><i class="fa fa-shopping-cart">&nbsp;</i>5 Year Membership</h3>
                                                            @if(isset($is_admin) && $is_admin == 1)
                                                                <a class="plan-edit-tool"><i class="fa fa-pencil-square-o"></i></a>
                                                            @endif
                                                        </div>
                                                        <div class="arrow-down border-top-blue"></div>

                                                        <div class="plan-body">
                                                            <h3>
                                                                <span class="price-sign">$</span>225
                                                            </h3>
                                                        </div>

                                                        <div class="plan-footer">
                                                            <p>Go ahead and get the next 5 years out of the way.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-md-4">
                                                    <div class="mb-20 bordered shadow text-center light-gray-bg plan-box">
                                                        <div class="plan-header">
                                                            <h3 class="no-margin"><i class="fa fa-shopping-cart">&nbsp;</i>Quaterly Memberhip</h3>
                                                            @if(isset($is_admin) && $is_admin == 1)
                                                                <a class="plan-edit-tool"><i class="fa fa-pencil-square-o"></i></a>
                                                            @endif
                                                        </div>
                                                        <div class="arrow-down border-top-blue"></div>

                                                        <div class="plan-body">
                                                            <h3>
                                                                <span class="price-sign">$</span>13
                                                            </h3>
                                                        </div>

                                                        <div class="plan-footer">
                                                            <p>Guarterly Membership lasts for 3 months</p>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div class="tab-pane" id="tab_1_1_2">
                                        <h2 class="space-top text-center">Member List</h2>

                                        @if(isset($is_admin) && $is_admin == 1)
                                            <div class="row panel-body">
                                                <div class="col-md-12">
                                                    <a class="btn btn-primary">Invite</a>
                                                    <a class="btn btn-default">Import</a>
                                                    <a class="btn blue btn-outline" id="change-view-btn">Spreadsheet View</a>
                                                </div>
                                            </div>
                                        @endif


                                        <div class="section" id="member-icon-view">
                                            <div class="row panel-body">
                                                <div class="col-md-1">
                                                    <img class="adminbadge" src="/img/avatar/adminbadge.png">
                                                    <img class="avatar" src="/img/avatar/team1.jpg">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5> David Lister </h5>
                                                    <h6> President </h6>
                                                </div>
                                                <div class="col-md-4">
                                                    <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-green font-white bg-hover-grey-salsa socicon-skype tooltips" data-original-title="Skype"></a>
                                                    <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a>
                                                    <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-blue font-white bg-hover-grey-salsa socicon-twitter tooltips" data-original-title="Twitter"></a>
                                                </div>
                                            </div>

                                            <div class="row panel-body row-even">
                                                <div class="col-md-1">
                                                    <img class="adminbadge" src="/img/avatar/adminbadge.png">
                                                    <img class="avatar" src="/img/avatar/team2.jpg">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5> Arnold Rimmer </h5>
                                                    <h6> Guest Host </h6>
                                                </div>
                                            </div>

                                            <div class="row panel-body">
                                                <div class="col-md-1">
                                                    <img class="adminbadge" src="/img/avatar/adminbadge.png">
                                                    <img class="avatar" src="/img/avatar/team3.jpg">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5> Holly Dwarf </h5>
                                                    <h6> Treasurer </h6>
                                                </div>
                                            </div>

                                            <div class="row panel-body row-even">
                                                <div class="col-md-1">
                                                    <img class="avatar" src="/img/avatar/team4.jpg">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5> David Lister </h5>
                                                    <h6> Member </h6>
                                                </div>
                                            </div>

                                            <div class="row panel-body">
                                                <div class="col-md-1">
                                                    <img class="avatar" src="/img/avatar/team5.jpg">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5> Kristine Kochancky </h5>
                                                    <h6> Invited </h6>
                                                </div>
                                                @if(isset($is_admin) && $is_admin == 1)
                                                <div class="col-md-6">
                                                    <a href="javascript:;" class="btn btn-primary">Invited<br>4/15/2017</a>
                                                    <a href="javascript:;" class="btn btn-outline blue">Resend<br>Invitation</a>
                                                </div>
                                                @endif
                                            </div>

                                            <div class="row panel-body row-even">
                                                <div class="col-md-1">
                                                    <img class="avatar" src="/img/avatar/team6.jpg">
                                                </div>
                                                <div class="col-md-3">
                                                    <h5> David Lister </h5>
                                                    <h6> Request Membership </h6>
                                                </div>
                                                @if(isset($is_admin) && $is_admin == 1)
                                                <div class="col-md-6">
                                                    <a href="javascript:;" class="btn btn-primary">Approve</a>
                                                    <a href="javascript:;" class="btn btn-outline blue">Deny</a>
                                                </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="section" id="member-spreadsheet-view">

                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                                        <thead>
                                                        <tr>
                                                            <th> Admin </th>
                                                            <th> First Name </th>
                                                            <th> Last Name </th>
                                                            <th> Join Date </th>
                                                            <th> Membership Expiration </th>
                                                            <th> Expired </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td> <input type="checkbox" value="true"> </td>
                                                            <td> John </td>
                                                            <td> Smith </td>
                                                            <td> 01/01/2014 </td>
                                                            <td> 01/01/2017 </td>
                                                            <td> <input type="checkbox" value="false"> </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <input type="checkbox" value="true"> </td>
                                                            <td> Alexsa </td>
                                                            <td> Black </td>
                                                            <td> 05/16/2015 </td>
                                                            <td> 12/06/2017 </td>
                                                            <td> <input type="checkbox" value="false"> </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <input type="checkbox" value="false"> </td>
                                                            <td> Tim </td>
                                                            <td> Degner </td>
                                                            <td> 06/17/2014 </td>
                                                            <td> 09/01/2017 </td>
                                                            <td> <input type="checkbox" value="false"> </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <input type="checkbox" value="false"> </td>
                                                            <td> Eric </td>
                                                            <td> Hoffman </td>
                                                            <td> 06/16/2012 </td>
                                                            <td> 11/05/2016 </td>
                                                            <td> <input type="checkbox" value="true"> </td>
                                                        </tr>

                                                        <tr>
                                                            <td> <input type="checkbox" value="false"> </td>
                                                            <td> Tim </td>
                                                            <td> Boelaars </td>
                                                            <td> 01/15/2002 </td>
                                                            <td> 06/25/2016 </td>
                                                            <td> <input type="checkbox" value="true"> </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab_1_1_3">
                                        <h1 class="space-top page-title text-center">Configure Club</h1>
                                        <div class="section">

                                            <form class="create-club-form" action="{{url('/club/updateClubInformation')}}" method="post" enctype="multipart/form-data">
                                                {{csrf_field()}}
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2" style="text-align: right">Club Name</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control input-inline input-medium" name="club_name" value="{{$club->club_name}}">
                                                        </div>

                                                        <label class="col-md-1">Club Slug</label>
                                                        <div class="col-md-4">
                                                            <input type="text" class="form-control input-inline input-medium" name="club_slug" value="{{$club->club_slug}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2" style="text-align: right">Club Description </label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" name="club_description" rows = "5" >{{$club->club_description}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2" style="text-align: right">Club Short Description </label>
                                                        <div class="col-md-8">
                                                            <textarea class="form-control" name="club_short_description" rows = "3">{{$club->club_short_description}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2" style="text-align: right;">Club Website</label>
                                                        <div class="col-md-3">
                                                            <input class="form-control input-inline input-small" name="club_website" value="{{$club->club_website}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2" style="text-align: right">Club logo</label>
                                                        <div id="filediv" class="col-sm-3 filediv">
                                                            <img class="img-preview" src="/{{$club->club_logo}}">
                                                            <input name="clublogo" type="file" id="clublogo"/>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2" style="text-align: right;">Address</label>
                                                        <div class="col-md-2">
                                                            <input class="form-control input-inline input-small" name="club_address" value="{{$club->club_address}}">
                                                        </div>
                                                        <label class="col-md-1" style="text-align: right;">City</label>
                                                        <div class="col-md-2">
                                                            <input class="form-control input-inline input-small" name="club_city" value="{{$club->club_city}}">
                                                        </div>
                                                        <label class="col-md-1" style="text-align: right;">State</label>
                                                        <div class="col-md-2">
                                                            <input class="form-control input-inline input-small" name="club_state" value="{{$club->club_city}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2" style="text-align: right;">Zip Code</label>
                                                        <div class="col-md-2">
                                                            <input class="form-control input-inline input-small" name="club_zip" value="{{$club->club_zip}}">
                                                        </div>
                                                        <label class="col-md-1" style="text-align: right;">Phone Number</label>
                                                        <div class="col-md-2">
                                                            <input class="form-control input-inline input-small" name="club_phone" value="{{$club->club_phone}}">
                                                        </div>
                                                        <label class="col-md-1" style="text-align: right;">Membership Limit</label>
                                                        <div class="col-md-2">
                                                            <input class="form-control input-inline input-small" name="membership_limit" value="{{$club->membership_limit}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-md-2" style="text-align: right;">Club Type</label>
                                                        <div class="col-md-3">
                                                            <select class="form-control input-inline input-small" name="club_type" >
                                                                <option value="Closed"> Closed Club </option>
                                                                <option value="Moderated"> Moderated Club </option>
                                                                <option value="Open"> Open Club </option>
                                                                <option value="Privated"> Private Club </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="form-actions clearfix">
                                                    <button type="submit" class="btn green pull-right"> Update Club Information </button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="section">
                                            <h2 class="space-top page-title text-center">Payment Services</h2>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="javascript:;"><i class="fa fa-paypal"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="section">
                                            <h2 class="space-top page-title text-center">Transactions</h2>
                                            <div class="portlet light ">
                                                <div class="portlet-title">
                                                    <div class="tools"> </div>
                                                </div>
                                                <div class="portlet-body">
                                                    <div class="table-toolbar">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="btn-group">
                                                                    <button id="sample_editable_1_new" class="btn green"> Add New
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                        <thead>
                                                        <tr>
                                                            <th> Date </th>
                                                            <th> Name </th>
                                                            <th> Amount </th>
                                                            <th> Source </th>
                                                            <th> Recepit </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td> 2/15/2016 </td>
                                                            <td> John Smith </td>
                                                            <td> 45 </td>
                                                            <td> Paypal </td>
                                                            <td> 425342123 </td>
                                                        </tr>

                                                        <tr>
                                                            <td> 2/15/2016 </td>
                                                            <td> John Smith </td>
                                                            <td> 45 </td>
                                                            <td> Paypal </td>
                                                            <td> 425342123 </td>
                                                        </tr>

                                                        <tr>
                                                            <td> 2/15/2016 </td>
                                                            <td> John Smith </td>
                                                            <td> 45 </td>
                                                            <td> Paypal </td>
                                                            <td> 425342123 </td>
                                                        </tr>

                                                        <tr>
                                                            <td> 2/15/2016 </td>
                                                            <td> John Smith </td>
                                                            <td> 45 </td>
                                                            <td> Paypal </td>
                                                            <td> 425342123 </td>
                                                        </tr>

                                                        <tr>
                                                            <td> 2/15/2016 </td>
                                                            <td> John Smith </td>
                                                            <td> 45 </td>
                                                            <td> Paypal </td>
                                                            <td> 425342123 </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->
                                        </div>

                                        <div class="section">
                                            <h2 class="space-top page-title text-center">Discounts</h2>

                                            <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                            <div class="portlet light portlet-fit ">

                                                <div class="portlet-body">
                                                    <div class="table-toolbar">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="btn-group pull-right">
                                                                    <button id="sample_editable_1_new" class="btn btn-primary"> New Discount
                                                                        <i class="fa fa-plus"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                                                        <thead>
                                                        <tr>
                                                            <th> Created Date </th>
                                                            <th> Name </th>
                                                            <th> Amount </th>
                                                            <th> Applied to </th>
                                                            <th> Uses </th>
                                                            <th> Expires </th>
                                                            <th> Edit </th>
                                                            <th> Delete </th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td> 2/15/16 </td>
                                                            <td> Introductery Rate </td>
                                                            <td> $45 </td>
                                                            <td> New Users </td>
                                                            <td> 16 </td>
                                                            <td> Never</td>
                                                            <td>
                                                                <a class="edit" href="javascript:;"> Edit </a>
                                                            </td>
                                                            <td>
                                                                <a class="delete" href="javascript:;"> Delete </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td> 3/15/16 </td>
                                                            <td> Boarder Member Discount </td>
                                                            <td> %50 </td>
                                                            <td> Selected Users </td>
                                                            <td> 10 </td>
                                                            <td> Never</td>
                                                            <td>
                                                                <a class="edit" href="javascript:;"> Edit </a>
                                                            </td>
                                                            <td>
                                                                <a class="delete" href="javascript:;"> Delete </a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td> 3/18/16 </td>
                                                            <td> March Madness </td>
                                                            <td> %10 </td>
                                                            <td> EveryOne </td>
                                                            <td> 2 </td>
                                                            <td> 4/1/16 </td>
                                                            <td>
                                                                <a class="edit" href="javascript:;"> Edit </a>
                                                            </td>
                                                            <td>
                                                                <a class="delete" href="javascript:;"> Delete </a>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END EXAMPLE TABLE PORTLET-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="../assets/apps/scripts/calendar.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL SCRIPTS -->

<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<script src="../assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
<!-- Editable Datatable plugin -->
<script src="../assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var click = false;
    $(function() {
        $('#change-view-btn').on('click', function() {
            $('#member-icon-view').fadeToggle(1000);
            $('#member-spreadsheet-view').fadeToggle(1000);
            if(click == false) $('#change-view-btn').text('Icon View');
            else $('#change-view-btn').text('Spreadsheet View');
            click = !click;
        });

        //Preview Avatar image
        $('body').on('change', '#clublogo', function() {
            var imageprev = $(".img-preview");
            if (this.files && this.files[0]) {
                //validation
                var ext = $(this).val().split('.').pop().toLowerCase();
                if ($.inArray(ext, ['png', 'jpg', 'jpeg']) == -1) {
                    alert("Invalid Image Format");
                    return;
                }

                //Image preview
                var reader = new FileReader();
                reader.onload = function(e) {
                    imageprev.attr('src', e.target.result);
                };
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

</script>

<script src="/js/club/configclub.js" type="text/javascript"></script>
@endpush