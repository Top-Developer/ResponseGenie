<?php $__env->startSection('title'); ?>
    MyAccount
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<link href="/dash_assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
<link href="/dash_assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />

<!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="/dash_assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="/dash_assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- END PAGE LEVEL PLUGINS -->
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="main-container" style="background: #eef1f5;">
    <div class="container">
        <h1 class="page-title text-center">My Account</h1>

        <div class="col-md-12">
            <div class="portlet light">
                <div class="portlet-title">
                    <div class="caption">
                        <h3>Personal Information</h3>
                    </div>
                </div>
                <div class="portlet-body">
                    <form action="#" method="post">
                        <div class="row">
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

                            <div class="col-sm-9">
                                <div class="row" style="margin-top: 110px">
                                    <div class="col-sm-3">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info has-feedback<?php echo e($errors->has('firstName') ? ' has-error' : ''); ?>">
                                            <input type="text" class="form-control input-md" id="form_control_1" value="<?php echo e(old('firstName')); ?>"  name="firstName">
                                            <label for="form_control_1">First Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info has-feedback<?php echo e($errors->has('firstName') ? ' has-error' : ''); ?>">
                                            <input type="text" class="form-control input-md" id="form_control_1" value="<?php echo e(old('firstName')); ?>"  name="firstName">
                                            <label for="form_control_1">Last Name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info has-feedback<?php echo e($errors->has('firstName') ? ' has-error' : ''); ?>">
                                            <input type="text" class="form-control input-md" id="form_control_1" value="<?php echo e(old('firstName')); ?>"  name="firstName">
                                            <label for="form_control_1">Zip Code</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info has-feedback<?php echo e($errors->has('firstName') ? ' has-error' : ''); ?>">
                                            <input type="text" class="form-control input-md" id="form_control_1" value="<?php echo e(old('firstName')); ?>"  name="firstName">
                                            <label for="form_control_1">Email</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <a href="javascript:;" class="btn btn-primary btn-outline">Reset Password</a>
                                    </div>

                                    <div class="col-sm-3">
                                        <a href="javascript:;" class="btn btn-default btn-outline">Delect Account</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- End portlet-body -->
            </div>
            <!-- End Portlet -->
        </div>

        <h2 class="page-title text-center">Transactions</h2>

        <div class="col-md-12">
            <div class="portlet light ">

                <div class="font-dark row">
                    <div class="col-sm-3">
                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                            <input class="form-control form-control-inline input-md date-picker" id="dob" data-date-format="yyyy-mm-dd" size="16" type="text" name="dob">
                            <label for="dob">From</label>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                            <input class="form-control form-control-inline input-md date-picker" id="dob" data-date-format="yyyy-mm-dd" size="16" type="text" name="dob">
                            <label for="dob">To</label>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <a class="btn green btn-outline">Update</a>
                    </div>
                </div>

                <div class="portlet-title">
                    <div class="caption">
                        <h3 class="page-title text-center">Transactions</h3>
                    </div>

                    <div class="tools"> </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                        <thead>
                        <tr>
                            <th> Date </th>
                            <th> Club Name </th>
                            <th> Event </th>
                            <th> Amount </th>
                            <th> Source </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 1/15/2015 </td>
                            <td> ToastMasters </td>
                            <td> Membership </td>
                            <td> $45.00 </td>
                            <td> Source </td>
                        </tr>
                        <tr>
                            <td> 12/19/2015 </td>
                            <td> South Louisiana IDPA </td>
                            <td> Membership </td>
                            <td> $50.00 </td>
                            <td> Credit Card </td>
                        </tr>
                        <tr>
                            <td> 2/1/2015 </td>
                            <td> ToastMasters </td>
                            <td> February Meeting </td>
                            <td> $10 </td>
                            <td> Cash </td>
                        </tr>
                        <tr>
                            <td> 2/25/2016 </td>
                            <td> South Louisiana </td>
                            <td> Feb Match </td>
                            <td> $20 </td>
                            <td> Cash </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE PORTLET-->
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('script'); ?>
<script src="/dash_assets/global/scripts/app.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/plupload/js/plupload.full.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="/dash_assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>


<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="/dash_assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="/dash_assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/dash_assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script type="text/javascript">
    $(function () {
        $('#btnUpload').on("click", function() {
            file = $('#image-upload')[0].files[0];
            var formdata = new FormData();
            var reader = new FileReader();
            reader.onloadend = function(e) {
                $('#btnUpload').val('Wait...');
                formdata.append("_token", $('meta[name="csrf-token"]').attr("content"));
                formdata.append("image", file);

                $.ajax({
                    url: $("#image_upload_url").val(),
                    type: 'POST',
                    data: formdata,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data == 'fail') {
                            alert("Failed to upload image.");
                            $('#btnUpload').val('Failed Upload!');
                        } else {
                            $('input[name="image"]').val(data);
                            $('#btnUpload').val('Success!');
                            $('#btnUpload').addClass('btn-success');
                        }
                    }
                });
            };
            reader.readAsDataURL(file);
        });
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.home_layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>