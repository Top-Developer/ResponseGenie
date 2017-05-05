<?php $__env->startSection('title'); ?>
    My Events
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<link href="/dash_assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="/dash_assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="/dash_assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />

<!--Social Icon -->
<link href="/dash_assets/global/plugins/socicon/socicon.css" rel="stylesheet" type="text/css" />

<!-- Datatable -->
<link href="/dash_assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="/dash_assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<!-- File Input -->
<link href="/dash_assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

<!-- DatePicker plugin -->
<link href="/dash_assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

<style type="text/css">
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
        max-width: 280px;
        border: 1px solid rgba(205, 227, 241, 0.74);
        margin: auto;
    }

    .plan-header {
        background: rgb(67, 112, 132);
        padding: 12px 40px;
        margin: 0;
        text-align: center;
    }

    .no-margin {
        color: white;
        font-family: "Open Sans",sans-serif;
        font-weight: 300;
    }

    .arrow-down {
        width: 0;
        height: 0;
        border-left: 15px solid transparent;
        border-right: 15px solid transparent;
        border-top: 15px solid;
        margin: auto;

        border-top-color: rgb(67, 112, 132)!important

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
        right: 10px;
        top: 10px;
        color: white;
        font-size: 20px;
    }

    .avatar {
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

</style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="portlet light">

                        <div class="portlet-body tabbable-default">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tab_2_1" data-toggle="tab"> Event Info </a>
                                </li>
                                <li>
                                    <a href="#tab_2_2" data-toggle="tab"> Members </a>
                                </li>
                                <li>
                                    <a href="#tab_2_3" data-toggle="tab"> Configure Event </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Tab1 start -->
                                <div class="tab-pane fade active in" id="tab_2_1">

                                    <h1 class="space-top page-title text-center">ToastMasters</h1>
                                    <h3 class="page-title text-center">Meeting 4/17/2016</h3>
                                    <div class="row panel-body">
                                        <div class="col-md-3">
                                            <img src="/img/economy.jpg" style="border: 1px solid transparent; border-radius: 5px !important;">
                                        </div>
                                        <div class="col-md-9">
                                            <h4>Monthly Meeting of ToastMasters</h4>
                                            <h5>This Month Frank will be directing the meeting</h5>
                                        </div>
                                    </div>


                                    <div class="row space-top">
                                        <div class="col-md-4">
                                            <div class="mb-20 bordered shadow text-center light-gray-bg plan-box">
                                                <div class="plan-header">
                                                    <h4 class="no-margin" style="float: left; display: inline-block"><i class="fa fa-shopping-cart"></i></h4>
                                                    <h4 class="no-margin">Event Price</h4>
                                                    <a class="plan-edit-tool"><i class="fa fa-pencil-square-o"></i></a>
                                                </div>
                                                <div class="arrow-down border-top-blue"></div>

                                                <div class="plan-body">
                                                    <p>This event is free for ToastMasters Members</p>
                                                </div>

                                                <div class="plan-footer">
                                                    <h4>FREE</h4>
                                                    <a href="javascript:;" class="btn btn-primary">RSVP</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="mb-20 bordered shadow text-center light-gray-bg plan-box">
                                                <div class="plan-header">
                                                    <h4 class="no-margin" style="float: left; display: inline-block"><i class="fa fa-shopping-cart"></i></h4>
                                                    <h4 class="no-margin">Event Price</h4>
                                                    <a class="plan-edit-tool"><i class="fa fa-pencil-square-o"></i></a>
                                                </div>
                                                <div class="arrow-down border-top-blue"></div>

                                                <div class="plan-body">
                                                    <p>Your $10 covers food and beverage served during the meeting.</p>
                                                </div>

                                                <div class="plan-footer">
                                                    <h4>$10</h4>
                                                    <a href="javascript:;" class="btn btn-primary">Pay</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <a href="javascript:;" class="btn blue btn-outline">Add Price</a>
                                        </div>

                                    </div>


                                    

                                    
                                    
                                        
                                            
                                                
                                                    
                                                        
                                                    
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                        
                                                    
                                                    
                                                        
                                                    
                                                
                                                
                                                    
                                                        
                                                    
                                                    
                                                        
                                                    
                                                
                                            
                                        

                                        
                                            
                                            
                                        

                                        
                                            
                                                
                                                    
                                                
                                                
                                                    
                                                    
                                                    
                                                
                                            

                                            
                                                
                                                    
                                                
                                                
                                                    
                                                    
                                                    
                                                
                                            
                                        

                                    
                                    


                                </div>

                                <!-- Tab 2 Members start -->
                                <div class="tab-pane fade" id="tab_2_2">
                                    <h1 class="page-title text-center">ToastMasters</h1>
                                    <h2 class="text-center">Meeting 4/17/2016</h2>

                                    <div class="container">
                                        <div class="panel-body">
                                            <a class="btn blue btn-outline" id="change-view-btn">Spreadsheet View</a>
                                        </div>
                                    </div>

                                    <div id="member-icon-view">
                                        <div class="row panel-body">
                                            <div class="col-md-1">
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
                                                <img class="avatar" src="/img/avatar/team2.jpg">
                                            </div>
                                            <div class="col-md-3">
                                                <h5> Arnold Rimmer </h5>
                                                <h6> Guest Host </h6>
                                            </div>
                                        </div>

                                        <div class="row panel-body">
                                            <div class="col-md-1">
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
                                            <div class="col-md-6">
                                                <a href="javascript:;" class="btn btn-primary">Invited<br>4/15/2017</a>
                                                <a href="javascript:;" class="btn btn-outline blue">Resend<br>Invitation</a>
                                            </div>
                                        </div>

                                        <div class="row panel-body row-even">
                                            <div class="col-md-1">
                                                <img class="avatar" src="/img/avatar/team6.jpg">
                                            </div>
                                            <div class="col-md-3">
                                                <h5> David Lister </h5>
                                                <h6> Request Membership </h6>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="javascript:;" class="btn btn-primary">Invited<br>4/15/2017</a>
                                                <a href="javascript:;" class="btn btn-outline blue">Resend<br>Invitation</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="member-spreadsheet-view">

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
                                <div class="tab-pane fade" id="tab_2_3">
                                    <h1 class="space-top page-title text-center">Configure Event</h1>
                                    <section class="space-top">

                                        <div class="form-group row">
                                            <label class="col-md-2" style="text-align: right">Event Name</label>
                                            <div class="col-md-4">
                                                <input type="text" class="form-control input-inline input-large" placeholder="Name of your event">
                                            </div>

                                            <label class="col-md-2" style="text-align: right">Event Date</label>
                                            <div class="col-md-4">
                                                <input class="form-control form-control-inline input-md date-picker" id="dob" data-date-format="yyyy-mm-dd" size="16" type="text" name="dob">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2" style="text-align: right">Event Description <br> Public</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows = "5"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2" style="text-align: right">Event Description <br> Attendees's Only</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows = "5"></textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2" style="text-align: right">Event Logo</label>
                                            <div class="col-sm-3">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 200px; border: 1px solid #00af8e;">
                                                        <img src="http://www.placehold.it/200x200/EFEFEF/AAAAAA&amp;text=Add+Photo">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 200px;"> </div>
                                                    <div>
                                                        <span class="btn default btn-file">
                                                            <span class="fileinput-new"> Choose </span>
                                                            <span class="fileinput-exists"> Change </span>
                                                            <input type="file" name="image_upload" id="image-upload">
                                                        </span>

                                                        <input type="button" class="btn btn-primary" id="btnUpload" value="Upload" style="float:right">
                                                        <input type="hidden" id="image_upload_url" value="<?php echo e(url('/image-upload')); ?>">
                                                        <input type="hidden" id="image_upload" name="image" value="none" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2" style="text-align: right;">Zip Code</label>
                                            <div class="col-md-1">
                                                <input class="form-control input-inline input-small">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-md-2" style="text-align: right;">Event Type</label>
                                            <div class="col-md-3">
                                                <select class="form-control input-inline input-small">
                                                    <option> Public Club </option>
                                                    <option> Member Only Event </option>
                                                    <option> Invite Only Event </option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-offset-2">
                                                <input type="checkbox" checked> Display guest list to all guests?
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-md-offset-10">
                                                <a href="javascript:;" class="btn blue btn-outline">Cancel</a>
                                                <a href="javascript:;" class="btn btn-primary">Save</a>
                                            </div>
                                        </div>

                                    </section>

                                    <div class="separator"></div>

                                    <section class="space-top">
                                        <h2 class="space-top page-title text-center">Invites</h2>
                                        <div class="portlet light ">
                                            <div class="portlet-body">
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                    <tr>
                                                        <th> Select </th>
                                                        <th> First Name </th>
                                                        <th> Last Name </th>
                                                        <th> Invite Sent </th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td> <input type="checkbox" checked> </td>
                                                        <td> Alexa </td>
                                                        <td> Black </td>
                                                        <td> 4/13/2016 </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <input type="checkbox"> </td>
                                                        <td> Tim </td>
                                                        <td> Degner </td>
                                                        <td> 5/13/2017 </td>
                                                    </tr>

                                                    <tr>
                                                        <td> <input type="checkbox"> </td>
                                                        <td> Eric </td>
                                                        <td> Hoffman </td>
                                                        <td> 4/13/2016 </td>
                                                    </tr>

                                                    </tbody>
                                                </table>
                                                <a href="javascript:;" class="btn btn-primary pull-right">Send Invites</a>
                                            </div>
                                        </div>
                                    </section>

                                    <div class="separator"></div>

                                    <section class="space-top">
                                        <h2 class="space-top page-title text-center">Transactions</h2>
                                        <div class="portlet light ">
                                            <div class="portlet-title">
                                                <div class="tools"> </div>
                                            </div>
                                            <div class="portlet-body">
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
                                    </section>

                                    <div class="separator"></div>

                                    <section class="space-top">
                                        <h2 class="space-top page-title text-center">Message Text</h2>
                                        <div class="form-group row">
                                            <label class="col-md-2" style="text-align: right">Welcome Message</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows = "5"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2" style="text-align: right">Renewal Message</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows = "5"></textarea>
                                            </div>
                                        </div>
                                    </section>


                                    <div class="separator"></div>

                                    <section class="space-top">
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

                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/dash_assets/global/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<script src="/dash_assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/dash_assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="/dash_assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/dash_assets/apps/scripts/calendar.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->

<!-- Datatable script -->
<script src="/dash_assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<script src="/dash_assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>

<!-- File Upload -->
<script src="/dash_assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>

<!-- Editable Datatable plugin -->
<script src="/dash_assets/pages/scripts/table-datatables-editable.min.js" type="text/javascript"></script>

<!-- Date Picker plugin-->
<script src="/dash_assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/dash_assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>

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
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.home_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>