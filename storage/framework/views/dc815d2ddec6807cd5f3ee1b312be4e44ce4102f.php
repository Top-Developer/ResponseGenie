<?php $__env->startSection('title'); ?>
    Club Management
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<link href="<?php echo e(url('/assets/global/plugins/socicon/socicon.css')); ?>" rel="stylesheet" type="text/css" />
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
                    <h1> Your clubs and members. </h1>
                </div>
                <!-- END PAGE TITLE -->
                <!-- BEGIN PAGE TOOLBAR -->
                <div class="page-toolbar">
                    <a href="<?php echo e(url('/createClub')); ?>" class="btn blue" style="margin-top: 15px;"> Create a new club </a>
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
                        <span> <?php echo e($theClub -> name); ?></span>
                    </li>
                </ul>
                <!-- END PAGE BREADCRUMBS -->

                <?php if($errors -> any()): ?>
                    <h4><?php echo e($errors -> first()); ?></h4>
                <?php endif; ?>
                <?php if( $csvpath = Session::get('csvpath') ): ?>
                    <h4><?php echo e($csvpath); ?></h4>
                <?php endif; ?>

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
                            <?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
                                <li>
                                    <a href="#tab_2_5" data-toggle="tab"> Configure Club </a>
                                </li>
                                <li>
                                    <a href="#tab_2_6" data-toggle="tab"> Transactions </a>
                                </li>
                                <li>
                                    <a href="#tab_2_7" data-toggle="tab"> Discounts </a>
                                </li>
                            <?php endif; ?>
                            </ul>
                            <div class="tab-content">
                                <!-- Tab1 start -->
                                <div class="tab-pane fade active in" id="tab_2_1">
                                    <?php echo $__env->make('club.management.tabs.clubInfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <div class="tab-pane fade" id="tab_2_2">
                                    <?php echo $__env->make('club.management.tabs.events', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <div class="tab-pane fade" id="tab_2_3">
                                    <?php echo $__env->make('club.management.tabs.members', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <div  class="tab-pane fade" id="tab_2_4">
                                    <?php echo $__env->make('club.management.tabs.membership_plans', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                            <?php if( $theUserRole == 'owner' || $theUserRole == 'admin' ): ?>
                                <div  class="tab-pane fade" id="tab_2_5">
                                    <?php echo $__env->make('club.management.tabs.configureClub', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <div  class="tab-pane fade" id="tab_2_6">
                                    <?php echo $__env->make('club.management.tabs.transactions', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <div  class="tab-pane fade" id="tab_2_7">
                                    <?php echo $__env->make('club.management.tabs.discount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
<?php echo $__env->make('club.management.modals.edit_contact_info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.invite', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.import', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.add_new_plan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.edit_membership_plan', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.success', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.error', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.select_column', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.add_discount', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.select_transaction_column', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('club.management.modals.manual_trans', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
        $("form.ajax").on("submit", function(event){
            event.preventDefault();

            var formData = $(this).serialize();
            var formAction = $(this).attr('action');
            var formMethod = $(this).attr('method');

            $.ajax({
                type : formMethod,
                url : formAction,
                data : formData,
                cache : false,

                beforeSend : function(){
                    console.log(formData);
                    $('div.modal.in').modal('toggle');
                },

                success : function(data){
                    console.log(data);
                    $('div.modal.success').modal('toggle');
                },

                error : function(){
                    console.log('error');
                    $('div.modal.error').modal('toggle');
                }
            });

            return false;
        });
    });
    $(document).ready(function(){
        var flag = 0;
        $("#addALine").on("click", function(){
            var newChild = $(this).parent().parent().prev().html();
            if ( '#' == $(this).parent().parent().prev().find('div:first-child').text() ){
                $(this).parent().parent().before(
                    '<div class="row member-input" id="info-wrapper">' +
                    '<div class="col-md-1" style="text-align: right;">' +
                    '1' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<input type="text" id="firstName" name="m_name_first[]" required="">' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<input type="text" id="lastName" name="m_name_last[]" required="">' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<input type="email" id="email" name="m_email[]" required="">' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<input type="date" id="joinDate" name="m_join_date[]" required="">' +
                    '</div>' +
                    '<div class="col-md-2">' +
                    '<input type="date" id="expDate" name="m_exp_date[]" required="">' +
                    '</div>' +
                    '</div>');
            }
            else if( 0 < parseInt($(this).parent().parent().prev().find('div:first-child').text()) ){
                $(this).parent().parent().before( '<div class="row member-input" id="info-wrapper">' + newChild + '</div>');
                $(this).parent().parent().prev().find('div:first-child').text(
                    parseInt( $(this).parent().parent().prev().prev().find('div:first-child').text() ) + 1
                );
            }
        });
        $("#removeALine").on("click", function(){
            if ( '#' == $(this).parent().parent().prev().find('div:first-child').text() ){
            }else{
                $(this).parent().parent().prev().remove();
            }
        });
        $(".panel-title a[href='#edit_plan']").on("click", function(event){
            event.preventDefault();
            $('#edit_plan').find('#plan_name').val($(this).parent().find('#plan_name').text());
            $('#edit_plan').find('#plan_desc').val($(this).parent().parent().parent().find('#plan_desc').text());
            $('#edit_plan').find('#plan_dura').val($(this).parent().parent().parent().find('#plan_dura').text());
            var plan_dura_unit = $(this).parent().parent().parent().find('#plan_dura_unit').text();
            $('#edit_plan').find('#plan_dura_unit').children().removeAttr('selected');
            $.each($('#edit_plan').find('#plan_dura_unit').children(), function(index, element){
                console.log(plan_dura_unit);
                console.log($(this).text());
                if($(this).text() == plan_dura_unit) {console.log('same'); $(this).prop('selected', true);console.log($(this));}
            });
            $('#edit_plan').find('#plan_cost').val($(this).parent().parent().parent().find('#plan_cost').text());
            $('#edit_plan').find('input#plan_members_only').parent().removeClass('checked');
            if( $(this).parent().parent().parent().find('#plan_is_for_mem').text() == 'true' ){
                console.log('dfd');
                $('#edit_plan').find('input#plan_members_only').parent().attr('class', 'checked');
            }
            $('#edit_plan').find('#plan_id').val($(this).parent().parent().parent().find('#plan_id').text());
        });
        $("div#tab_2_3 button#member_view_toggle").on("click", function(event){
            console.log($(this).text());
            if( ' Icon View ' == $(this).text() ){
                $(this).text(' Spreadsheet View ');
                $(this).parent().parent().next().removeClass('active').addClass('hidden');
                $(this).parent().parent().parent().next().removeClass('hidden').addClass('active');
                $(this).parent().parent().parent().next().next().removeClass('active').addClass('hidden');
            }
            else if( ' Spreadsheet View ' == $(this).text() ){
                $(this).text(' Icon View ');
                $(this).parent().parent().next().removeClass('hidden').addClass('active');
                $(this).parent().parent().parent().next().removeClass('active').addClass('hidden');
                $(this).parent().parent().parent().next().next().removeClass('hidden').addClass('active');
            }
        });
        $('div#sel-col button#ref-col').on('click', function(event){
            console.log('clicked');
            if( $('input[type="checkbox"]#admin').is(':checked') ){
                $('.col-table-admin').css('display', 'table-cell');
            }
            else{
                $('.col-table-admin').css('display', 'none');
            }
            if( $('input[type="checkbox"]#ct').is(':checked') ){
                $('.col-table-city').css('display', 'table-cell');
            }
            else{
                $('.col-table-city').css('display', 'none');
            }
            if( $('input[type="checkbox"]#fname').is(':checked') ){
                $('.col-table-fn').css('display', 'table-cell');
            }
            else{
                $('.col-table-fn').css('display', 'none');
            }
            if( $('input[type="checkbox"]#stet').is(':checked') ){
                $('.col-table-state').css('display', 'table-cell');
            }
            else{
                $('.col-table-state').css('display', 'none');
            }
            if( $('input[type="checkbox"]#lname').is(':checked') ){
                $('.col-table-ln').css('display', 'table-cell');
            }
            else{
                $('.col-table-ln').css('display', 'none');
            }
            if( $('input[type="checkbox"]#zcode').is(':checked') ){
                $('.col-table-zcode').css('display', 'table-cell');
            }
            else{
                $('.col-table-zcode').css('display', 'none');
            }
            if( $('input[type="checkbox"]#jdate').is(':checked') ){
                $('.col-table-jdate').css('display', 'table-cell');
            }
            else{
                $('.col-table-jdate').css('display', 'none');
            }
            if( $('input[type="checkbox"]#phone').is(':checked') ){
                $('.col-table-phone').css('display', 'table-cell');
            }
            else{
                $('.col-table-phone').css('display', 'none');
            }
            if( $('input[type="checkbox"]#expdate').is(':checked') ){
                $('.col-table-edate').css('display', 'table-cell');
            }
            else{
                $('.col-table-edate').css('display', 'none');
            }
            if( $('input[type="checkbox"]#mail').is(':checked') ){
                $('.col-table-email').css('display', 'table-cell');
            }
            else{
                $('.col-table-email').css('display', 'none');
            }
            if( $('input[type="checkbox"]#exp').is(':checked') ){
                $('.col-table-exp').css('display', 'table-cell');
            }
            else{
                $('.col-table-exp').css('display', 'none');
            }
        });
        $('div#sel-trans-cols button#ref-cols').on('click', function(){
            console.log('clicked');
            if( $('input[type="checkbox"]#_date').is(':checked') ){
                $('.col-table-date').css('display', 'table-cell');
            }
            else{
                $('.col-table-date').css('display', 'none');
            }
            if( $('input[type="checkbox"]#_fname').is(':checked') ){
                $('.col-table-fn').css('display', 'table-cell');
            }
            else{
                $('.col-table-fn').css('display', 'none');
            }
            if( $('input[type="checkbox"]#_lname').is(':checked') ){
                $('.col-table-ln').css('display', 'table-cell');
            }
            else{
                $('.col-table-ln').css('display', 'none');
            }
            if( $('input[type="checkbox"]#_amt').is(':checked') ){
                $('.col-table-amount').css('display', 'table-cell');
            }
            else{
                $('.col-table-amount').css('display', 'none');
            }
            if( $('input[type="checkbox"]#_src').is(':checked') ){
                $('.col-table-source').css('display', 'table-cell');
            }
            else{
                $('.col-table-source').css('display', 'none');
            }
            if( $('input[type="checkbox"]#_evp').is(':checked') ){
                $('.col-table-plan').css('display', 'table-cell');
            }
            else {
                $('.col-table-plan').css('display', 'none');
            }
            if( $('input[type="checkbox"]#_re').is(':checked') ){
                $('.col-table-re').css('display', 'table-cell');
            }
            else {
                $('.col-table-re').css('display', 'none');
            }
        });
        $('#calendar').fullCalendar({
            eventSources: [
                '/feed2.php'
            ]
        });
        $('input[name="discount_type"]').on('click', function(){
            if($(this).val() == 'amount'){
                $('span#unit').text('$');
            }
            else{
                $('span#unit').text('%');
            }
        });
        $('button#sandn').on('click', function(){
            $('form#mtForm').submit();
            document.getElementById('userSelector').selectedIndex = -1;
            document.getElementById('trSelector').selectedIndex = -1;
            $('input#amount').val('');
            flag = 1;
        });
        $('button#success_button').on('click', function(){
            $('div.modal.success').modal('hide');
            if(flag == 1){
                setTimeout(function(){
                    $('button#emt').trigger('click');
                    flag = 0;
                }, 1000);
            }
        });
        $('#date_filter').on('click', function(){
           if($('#transaction_from').val() != '' && $('#transaction_to').val() != ''){
               $from = $('#transaction_from').val();
               $to = $('#transaction_to').val();
               console.log($('table#dataTb > tbody').children());
               $('table#dataTb > tbody').children().each(function(){
                   console.log($from);
                   $date = $(this).find('td.col-table-date').text();
                   console.log($date);
                   console.log(new Date($(this).find('td.col-table-date').text()));
                   console.log($to);
                   if($date < $from){
                       $(this).css('display', 'none');
                   }
                   else if($date > $to){
                       $(this).css('display', 'none');
                   }
                   else{
                       $(this).css('display', 'table-row');
                   }
               });
           }
        });
        function exportTableToCSV($table, filename) {

            var $headers = $table.find('tr:has(th)')
                ,$rows = $table.find('tr:has(td)')

                // Temporary delimiter characters unlikely to be typed by keyboard
                // This is to avoid accidentally splitting the actual contents
                ,$tmpColDelim = String.fromCharCode(11) // vertical tab character
                ,$tmpRowDelim = String.fromCharCode(0) // null character

                // actual delimiter characters for CSV format
                ,$colDelim = '","'
                ,$rowDelim = '"\r\n"';

            // Grab text from table into CSV formatted string
            var csv = '"';
            csv += $headers.map(function (i, row) {
                    var $row = $(row),
                        $cols = $row.find('th');

                    return $cols.map(function (j, col) {
                        var $col = $(col),
                            $text = $col.text();

                        return $text.replace(/"/g, '""'); // escape double quotes

                    }).get().join($tmpColDelim);

                }).get().join($tmpRowDelim)
                    .split($tmpRowDelim).join($rowDelim)
                    .split($tmpColDelim).join($colDelim) + $rowDelim;

            // Grab text from table into CSV formatted string
            csv += $rows.map(function (i, row) {
                    var $row = $(row),
                        $cols = $row.find('td');

                    return $cols.map(function (j, col) {
                        var $col = $(col),
                            $text = $col.text();

                        return $text.replace(/"/g, '""'); // escape double quotes

                    }).get().join($tmpColDelim);

                }).get().join($tmpRowDelim)
                    .split($tmpRowDelim).join($rowDelim)
                    .split($tmpColDelim).join($colDelim) + '"';

            console.log(csv);

            // Deliberate 'false', see comment below
            if (false && window.navigator.msSaveBlob) {

                var $blob = new Blob([decodeURIComponent(csv)], {
                    type: 'text/csv;charset=utf8'
                });

                // Crashes in IE 10, IE 11 and Microsoft Edge
                // See MS Edge Issue #10396033: https://goo.gl/AEiSjJ
                // Hence, the deliberate 'false'
                // This is here just for completeness
                // Remove the 'false' at your own risk
                window.navigator.msSaveBlob($blob, filename);

            } else if (window.Blob && window.URL) {console.log(2);
                // HTML5 Blob
                var $blob = new Blob([csv], { type: 'text/csv;charset=utf8' });
                var csvUrl = window.URL.createObjectURL($blob);

                $(this)
                    .attr({
                        'download': filename,
                        'href': csvUrl
                    });
            } else {
                // Data URI
                var csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

                $(this)
                    .attr({
                        'download': filename,
                        'href': csvData,
                        'target': '_blank'
                    });
            }
        }

        // This must be a hyperlink
        $(".export").on('click', function (event) {
            // CSV
            var args = [$('table#dataTb'), 'export.csv'];

            exportTableToCSV.apply(this, args);

            // If CSV, don't do event.preventDefault() or return false
            // We actually need this to be a typical hyperlink
        });

        $('select#discountApply').on('change', function(){
            if( $('select#discountApply').val() == 'selected' ){
                $('table#membersForDiscount').find('input.checkboxes').prop('disabled', false);
                $('table#membersForDiscount').find('div.checker').removeClass('disabled');
            }
            else if( $('select#discountApply').val() == 'everyone' ){
                $('table#membersForDiscount').find('input.checkboxes').prop('disabled', true);
                $('table#membersForDiscount').find('input.checkboxes').prop('checked', true);
                $('table#membersForDiscount').find('span').prop('class', 'checked');
                $('table#membersForDiscount').find('div.checker').addClass('disabled');
            }
            else if( $('select#discountApply').val() == 'new' ){
                $('table#membersForDiscount').find('input.checkboxes').prop('disabled', false);
                $('table#membersForDiscount').find('input.checkboxes').prop('checked', false);
                $('table#membersForDiscount').find('span').prop('class', '');
                $('table#membersForDiscount').find('div.checker').removeClass('disabled');
            }
            else if( $('select#discountApply').val() == 'existing' ){
                $('table#membersForDiscount').find('input.checkboxes').prop('disabled', true);
                $('table#membersForDiscount').find('input.checkboxes').prop('checked', true);
                $('table#membersForDiscount').find('span').prop('class', 'checked');
                $('table#membersForDiscount').find('div.checker').addClass('disabled');
            }
            $('input[name=discount_uses]').val($('table#membersForDiscount').find('input.checkboxes:checked').length);
        });
        $('table#membersForDiscount').find('input.checkboxes').on('click', function(){
            $('input[name=discount_uses]').val($('table#membersForDiscount').find('input.checkboxes:checked').length);
        });
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

    })
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hometemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>