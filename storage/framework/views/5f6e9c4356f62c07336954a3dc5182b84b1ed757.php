<?php $__env->startSection('title'); ?>
    Event Management
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<link href="<?php echo e(url('/assets/global/plugins/socicon/socicon.css')); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo e(url('/assets/global/plugins/fullcalendar/fullcalendar.min.css')); ?>" rel="stylesheet" type="text/css" />
<!-- File Input -->
<link href=<?php echo e(url('/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css')); ?> rel="stylesheet" type="text/css" />
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

    .panel{
        text-align: center;
    }

    .content-body{
        padding: 0px 25px;
    }

    .row input{
        width : 100%;
    }

    div.contact-member img{
        width:100%;
    }

    div.member-input div{
        margin : 15px 0;
    }

    div.member-input input{
        width:100%;
    }

    div.member-input button{
        margin-top : 8px;
    }

    .socicon-btn{
        margin : 5px;
    }

    div.panel-footer::after{
        clear: both;
        display: table;
        content: " ";
    }

    div.panel-footer div{
        width:50%;
        float:left;
    }

    div.panel-footer div#price_cost{
        padding-top: 7px;
    }

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <!-- BEGIN PAGE CONTENT INNER -->

    <div class="page-container">
        <div class="page-content-wrapper">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <div class="container">
                    <!-- BEGIN PAGE TITLE -->
                    <div class="page-title">
                        <h1> Your events and members. </h1>
                    </div>
                    <!-- END PAGE TITLE -->
                </div>
            </div>
            <!-- END PAGE HEAD-->

            <div class="page-content">
                <div class="container">
                    <!-- BEGIN PAGE BREADCRUMBS -->
                    <ul class="page-breadcrumb breadcrumb">
                        <li>
                            <span> Events / </span>
                        </li>
                        <li>
                            <span> My Event / </span>
                        </li>
                        <li>
                            <span> <?php echo e($event -> name); ?></span>
                        </li>
                    </ul>
                    <!-- END PAGE BREADCRUMBS -->

                    <?php if($errors -> any()): ?>
                        <h4><?php echo e($errors -> first()); ?></h4>
                    <?php endif; ?>

                    <div class="page-content-inner">
                        <div class="portlet light">
                            <div class="portlet-body tabbable-default">
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_2_1" data-toggle="tab"> Event Info </a>
                                    </li>
                                    <li>
                                        <a href="#tab_2_2" data-toggle="tab"> Event Members </a>
                                    </li>
                                    <?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
                                        <li>
                                            <a href="#tab_2_5" data-toggle="tab"> Configure Event </a>
                                        </li>
                                        <li>
                                            <a href="#tab_2_6" data-toggle="tab"> Transactions </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                                <div class="tab-content">
                                    <!-- Tab1 start -->
                                    <div class="tab-pane fade active in" id="tab_2_1">
                                        <?php echo $__env->make('event.management.tabs.eventInfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                    <div class="tab-pane fade" id="tab_2_2">
                                        <?php echo $__env->make('event.management.tabs.eventMembers', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    </div>
                                    <?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
                                        <div  class="tab-pane fade" id="tab_2_3">
                                            <?php echo $__env->make('event.management.tabs.eventConfigure', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                        <div  class="tab-pane fade" id="tab_2_4">
                                            <?php echo $__env->make('event.management.tabs.eventTransactions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('event.management.modals.editContactInfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('event.management.modals.addEventPrice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('event.management.modals.editEventPrice', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('script'); ?>
<script src="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCjKyxewbk6_hbH9tSAjNWTPCqN9hiPz-o" type="text/javascript"></script>
<script src="<?php echo e(url('/assets/global/plugins/gmaps/gmaps.min.js')); ?>" type="text/javascript"></script>
<script>
    $(document).ready(function(){
        if("<?php echo e(Session::get('active_tab')); ?>"){
            $("a[href=\"#<?php echo e(Session::get('active_tab')); ?>\"").trigger('click');
        }
    });
    $(".panel-title a[href='#edit_event_price']").on("click", function(event){
        event.preventDefault();
        $('#edit_event_price').find('#price_name').val($(this).parent().find('#price_name').text());
        $('#edit_event_price').find('#price_desc').val($(this).parent().parent().parent().find('#price_desc').text());
        var cost = $(this).parent().parent().parent().find('#price_cost').text().trim();
        if( 'Free' == cost){
            $('#edit_event_price').find('#price_cost').val(0);
        }
        else if( "$" == cost.substring(0,1) ){
            $('#edit_event_price').find('#price_cost').val(cost.substring(1));
        }
        $('#edit_event_price').find('input#price_members_only').parent().removeClass('checked');
        if( $(this).parent().parent().parent().find('#price_is_for_mem').text() == '1' ){
            $('#edit_event_price').find('input#price_members_only').parent().attr('class', 'checked');
        }
        $('#edit_event_price').find('#price_id').val($(this).parent().parent().parent().find('#price_id').text());
    });
    $(document).ready(function(){
        var geocoder; //To use later
        var map; //Your map

        geocoder = new google.maps.Geocoder();
        //Default setup
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var myOptions = {
            zoom: 8,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("gmap_contact"), myOptions);

        var zcode = '<?php echo e($theContact -> zipcode); ?>';
        geocoder.geocode( { 'address': zcode }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //Got result, center the map and put it out there
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert("Geocode was not successful for the following reason: " + status);
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hometemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>