@extends('layouts.hometemplate')

@section('title')
    Club Management
@endsection

@push('asset')
<style>
    .card {
        background:#FFF;
        display: block;
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        border:1px solid #AAA;
        border-bottom:3px solid #BBB;
        padding:0px;
        margin-bottom:1em;
        overflow:hidden;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-body{
        display:flex;
    }

    .card-content {
        width: 100%;
    }

    .pull-left {
        float: left;
    }

    .pull-none {
        float: none !important;
    }

    .pull-right {
        float: right;
    }

    .card-header{
        width:100%;
        color:#2196F3;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);

    }

    .card-header-blue{
        background-color:#2196F3;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-header-red{
        background-color:#F44336;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-header-grey{
        background-color:#424242;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-header-orange{
        background-color:#E65100;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .card-header-pink{
        background-color:#E91E63;
        color:#FFFFFF;
        border-bottom:3px solid #BBB;
        box-shadow: 0 8px 17px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        font-family: 'Roboto', sans-serif;
        padding:0px;
        margin-top:0px;
        overflow:hidden;
        -webkit-transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        transition: box-shadow 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .card-heading {
        display: block;
        font-size: 25px;
        line-height: 20px;
        margin-bottom: 24px;
        border-bottom: 1px #2196F3;
        text-align: center;
        color:#fff;

    }
    .card-footer{
        border-top:1px solid #eee;
        padding: 10px;
        text-align: center;
        background-color: rgb(235, 237, 241);

    }

    .card-footer a:hover {
        text-decoration: none;
    }

    .card-action-pink{
        color:#E91E63;
        font-size: large;
    }
    .card-action-red{
        color:#F44336;
        font-size: large;
    }
    .card-action-grey{
        color:#424242;
        font-size: large;
    }
    .card-action-pink{
        color:#E91E63;
        font-size: large;
    }
    .card-action-orange{
        color:#E65100;
        font-size: large;
    }


    .card-image img {
        display: block;
        height: auto;
        width: 100%;

    }

    .card-body-image {
        width: 100%;
        height: 150px;
        border: 1px solid transparent;
        border-radius: 5px;
    }

    .card-body-section {
        display: block;
        width: 50%;
        padding: 10px;
    }

    .card-date-label {
        font-size: 16px;
        font-weight: 500;
        color: #5b9bd1;
    }

    .card-date-box {
        height: 50%;
        padding: 10px;
        border-bottom: 1px solid #eee;
    }

    div.contact-member img{
        width:100%;
    }

</style>
@endpush

@section('content')

<!-- BEGIN PAGE CONTENT INNER -->

<div class="page-container">
    <div class="page-content-wrapper">
        <!-- BEGIN PAGE HEAD-->
        <div class="page-head">
            <div class="container">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1> Your clubs and members. </h1>
                </div>
                <!-- END PAGE TITLE -->
                <!-- BEGIN PAGE TOOLBAR -->
                <div class="page-toolbar">
                    <a href="{{url('/createClub')}}" class="btn blue" style="margin-top: 15px;"> Create a new club </a>
                </div>
                <!-- END PAGE TOOLBAR -->
            </div>
        </div>
        <!-- END PAGE HEAD-->

        <div class="page-content">
            <div class="container">
                <!-- BEGIN PAGE BREADCRUMBS -->
                <ul class="page-breadcrumb breadcrumb">
                    <li>
                        <span> Clubs / </span>
                    </li>
                    <li>
                        <span> My club / </span>
                    </li>
                    <li>
                        <span> {{ $theClub -> name }}</span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMBS -->

                <div class="page-content-inner">
                    <div class="portlet light">
                        <div class="portlet-body tabbable-default">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_2_1" data-toggle="tab"> Club Info </a>
                                </li>
                                <li>
                                    <a href="#tab_2_2" data-toggle="tab"> Events </a>
                                </li>
                                <li>
                                    <a href="#tab_2_3" data-toggle="tab"> Members </a>
                                </li>
                                <li>
                                    <a href="#tab_2_4" data-toggle="tab"> Membership Plans </a>
                                </li>
                                <li>
                                    <a href="#tab_2_5" data-toggle="tab"> Configure Club </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Tab1 start -->
                                <div class="tab-pane fade active in" id="tab_2_1">
                                    <div class="note note-info">
                                        <h4 style="text-align:center;">Club Name : {{$theClub -> name}}</h4>
                                        <div class="row">
                                            <div class = "col-md-6">
                                                <img src="/{{$theClub -> logo_path}}" class="card-body-image">
                                            </div>
                                            <div class = "col-md-6">
                                                Club Description :<br>{{ $theClub -> description }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="note note-info">
                                        <div class = "row">
                                            @if( $theRole == 'owner' || $theRole == 'admin' )
                                            <div style="float:right;">
                                                <a type="button" class="btn btn-danger"  data-toggle="modal" href="#edit_contact_info"> Edit contact information </a>
                                            </div>
                                            @endif
                                            <h3 style="text-align:center;">Location and Contact Information</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-twitter tooltips" data-original-title="Twitter"></a>
                                                <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-yellow font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a>
                                                <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-google tooltips" data-original-title="Google"></a>
                                                <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-twitter tooltips" data-original-title="Twitter"></a>
                                                <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-yellow font-white bg-hover-grey-salsa socicon-facebook tooltips" data-original-title="Facebook"></a>
                                                <a href="#" class="socicon-btn socicon-btn-circle socicon-solid bg-dark font-white bg-hover-grey-salsa socicon-google tooltips" data-original-title="Google"></a>
                                            </div>
                                            <div class="col-md-3">
                                                <div id="gmap_basic" class="gmaps"> </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h1>City : {{ $theContact -> city }}</h1><br>
                                                <h1>State : {{ $theContact -> state }}</h1><br>
                                                <h1>Country : {{ $theContact -> country }}</h1>
                                            </div>
                                            @if( $thePCM || $theSCM )
                                            <div class="col-md-3">
                                                @if($thePCM)
                                                <div class = "row">
                                                    <div class = "col-md-6 contact-member">
                                                        @if( $thePCM -> profile_image == 'NULL')
                                                            <img src="/{{ $thePCM -> profile_image }}">
                                                        @else
                                                            <img src="/uploads/images/users/0.png">
                                                        @endif
                                                    </div>
                                                    <div class = "col-md-6">
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
                                                    <div class = "col-md-6 contact-member">
                                                        @if( $theSCM -> profile_image == 'NULL')
                                                            <img src="/{{ $theSCM -> profile_image }}">
                                                        @else
                                                            <img src="/uploads/images/users/0.png">
                                                        @endif
                                                    </div>
                                                    <div class = "col-md-6">
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
                                </div>
                                <div class="tab-pane fade" id="tab_2_2">
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
                                                    <div style="float:right;">

                                                    </div>
                                                </div>

                                                <div class="portlet-body">
                                                    <div class="row eventcontainer">
                                                        <div class="col-md-3 text-center monthdate">
                                                            <span class="month">May</span>
                                                            <span class="date">12th</span>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <span class="small mb-10 text-muted">South Louisiana IDPA</span>
                                                            <h6 class="title">Club Match</h6>
                                                        </div>
                                                    </div>

                                                    <div class="row eventcontainer">
                                                        <div class="col-md-3 text-center monthdate">
                                                            <span class="month">May</span>
                                                            <span class="date">15th</span>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <span class="small mb-10 text-muted">South Louisiana IDPA</span>
                                                            <h6 class="title">Club Membership Expiration</h6>
                                                        </div>
                                                    </div>

                                                    <div class="row eventcontainer">
                                                        <div class="col-md-3 text-center monthdate">
                                                            <span class="month">May</span>
                                                            <span class="date">17th</span>
                                                        </div>
                                                        <div class="col-md-9">
                                                            <span class="small mb-10 text-muted">ToastMasters</span>
                                                            <h6 class="title">Monthly Meeting</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Portlet -->
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab_2_3">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="edit_contact_info" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class = "ajax" action = "{{url('/edit/contact')}}" method = "post">
                {{csrf_field()}}
                <input name = "club_id" value = {{$theClub -> id}}>
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Responsive &amp; Scrollable</h4>
                </div>
                <div class="modal-body">
                    <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
                        <div class="scroller" style="margin-right:-17px; height: 317px; overflow: scroll; width: auto;" data-always-visible="1" data-rail-visible1="1" data-initialized="1">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <h4 style="text-align:center;">Meeting Location</h4>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "city">City</label>
                                            <input type="text" id = "city" name = "city" class="col-md-12" value = "{{$theContact -> city}}">
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "state">State</label>
                                            <input type="text" id = "state" name = "state" class="col-md-12" value = "{{$theContact -> state}}">
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "zcod">Zipcode</label>
                                            <input type="text" id = "zcod" name = "zipcode" class="col-md-12" value = "{{$theContact -> zipcode}}">
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <div id="gmap_marker" class="gmaps"></div>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "">Primary Contact</label>
                                            <select name = "pcmid">
                                                @foreach( $theClubUsers as $aUser )
                                                    <option value = "{{$aUser -> id}}" @if( $theContact -> pcm_id == $aUser -> id ) selected @endif>{{$aUser -> email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class="col-md-12">
                                            <label for = "zcod">Secondary Contact</label>
                                            <select name = "scmid">
                                                @foreach( $theClubUsers as $aUser )
                                                    <option value = "{{$aUser -> id}}" @if( $theContact -> scm_id == $aUser -> id ) selected @endif>{{$aUser -> email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-linkedin tooltips col-md-1" data-original-title="Linkedin"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "inLink" class="col-md-6 form-control">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "inLevel" class="col-md-5 form-control">
                                                <option> Public </option>
                                                <option> Members Only </option>
                                                <option> Private </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-twitter tooltips col-md-1" data-original-title="Twitter"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "ttLink" class="col-md-6 form-control">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "ttLevel" class="col-md-5 form-control">
                                                <option> Public </option>
                                                <option> Members Only </option>
                                                <option> Private </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-facebook tooltips col-md-1" data-original-title="Facebook"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "fbLink" class="col-md-6 form-control">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "fbLevel" class="col-md-5 form-control">
                                                <option> Public </option>
                                                <option> Members Only </option>
                                                <option> Private </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-youtube tooltips col-md-1" data-original-title="Youtube"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "ytLink" class="col-md-6 form-control">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "ytLevel" class="col-md-5 form-control">
                                                <option> Public </option>
                                                <option> Members Only </option>
                                                <option> Private </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-google tooltips col-md-1" data-original-title="Google"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "goLink" class="col-md-6 form-control">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "goLevel" class="col-md-5 form-control">
                                                <option> Public </option>
                                                <option> Members Only </option>
                                                <option> Private </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class = "row">
                                        <div class = "col-md-1">
                                            <div class="socicon-btn socicon-sm socicon-mail tooltips col-md-1" data-original-title="Mail"></div>
                                        </div>
                                        <div class = "col-md-6">
                                            <input type="url" name = "maLink" class="col-md-6 form-control">
                                        </div>
                                        <div class = "col-md-5">
                                            <select name = "maLevel" class="col-md-5 form-control">
                                                <option> Public </option>
                                                <option> Members Only </option>
                                                <option> Private </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slimScrollBar" style="background: rgb(187, 187, 187); width: 7px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 7px; z-index: 99; right: 1px; height: 300px;"></div><div class="slimScrollRail" style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234); opacity: 0.2; z-index: 90; right: 1px;"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn dark btn-outline">Close</button>
                    <button type="submit" class="btn green">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection