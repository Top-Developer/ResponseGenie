<?php $__env->startSection('title'); ?>
    Create a New Club
<?php $__env->stopSection(); ?>

<?php $__env->startPush('asset'); ?>
<link href="/assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />

<!--Social Icon -->
<link href="/assets/global/plugins/socicon/socicon.css" rel="stylesheet" type="text/css" />

<!-- Datatable -->
<link href="/assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<!-- File Input -->
<link href="/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />

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
        max-width: 350px;
        border: 1px solid rgba(205, 227, 241, 0.74);
    }

    .plan-header {
        background: rgb(3, 153, 221);
        padding: 20px 40px;
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
    .page-title{
        margin: 50px auto 20px;
    }
    div.has-error input ~ span.help-block, div.has-error select ~ span.help-block, div.has-error textarea ~ span.help-block{
        opacity: 0 !important;
    }

    div.has-error input + span.help-block, div.has-error select + span.help-block, div.has-error textarea + span.help-block{
        opacity:1 !important;
        color:#e73d4a !important;
    }

</style>

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    
        
            
                
                
                    
                        
                    
                
            
        
        
            
                
                
            
            
        
        <div class="container" style = 'margin-bottom:30px;'>
            <div class="row">
                <div class="col-md-12">

                    <?php if(Session::has('message')): ?>
                        <div class="alert alert-<?php echo e(Session::get('status')); ?> status-box">
                            <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <?php echo e(Session::get('message')); ?>

                        </div>
                    <?php endif; ?>

                    <h1 class="space-top page-title text-center">Create a New Club</h1>
                    <section class="space-top space-bottom">

                        <form class="create-club-form" class = ajax action="<?php echo e(url('/club/create')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>


                            <div class = "row">
                                <div class="col-xs-12 col-sm-offset-2 col-sm-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_club_name" name = "club_name">
                                        <label for="form_control_club_name">Club Name</label>
                                        <span class="help-block">The name of your club</span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-offset-2 col-sm-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_club_slug" name = "club_slug">
                                        <label for="form_control_club_slug">Club Slug</label>
                                        <span class="help-block">Short name of your club</span>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class = "col-xs-12 col-sm-offset-2 col-sm-8">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" rows="3" id ="form_control_club_description" name ="club_description"></textarea>
                                        <label for="form_control_club_description">Club Description</label>
                                        <span class="help-block">Public description of your club</span>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class = "col-xs-12 col-sm-offset-2 col-sm-8">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <textarea class="form-control" rows="2" id ="form_control_club_short_description" name ="club_short_description"></textarea>
                                        <label for="form_control_club_short_description">Club Short Description</label>
                                        <span class="help-block">Private description for your members only</span>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class="col-xs-12 col-sm-offset-2 col-sm-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="url" class="form-control" id="form_control_club_site" name ="club_url">
                                        <label for="form_control_club_site">Club Website</label>
                                        <span class="help-block">Enter the URL of your club</span>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class="col-xs-12 col-sm-offset-2 col-sm-3">
                                    <label style="color: #888;">Club Logo</label>
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"> </div>
                                        <div>
                                            <span class="btn green btn-outline btn-file">
                                                <span class="fileinput-new"> Select image </span>
                                                <span class="fileinput-exists"> Change </span>
                                                <input type="file" name="club_logo">
                                            </span>
                                            <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class="col-xs-12 col-sm-offset-2 col-sm-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_club_addr" name ="club_addr">
                                        <label for="form_control_club_addr">Address</label>
                                        <span class="help-block">The address of your club</span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_club_city" name ="club_city">
                                        <label for="form_control_club_city">City</label>
                                        <span class="help-block">The city of your club</span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_club_stat" name ="club_state">
                                        <label for="form_control_club_stat">State</label>
                                        <span class="help-block">The state of your club</span>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class="col-xs-12 col-sm-offset-2 col-sm-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_club_zcod" name = "club_zipcode">
                                        <label for="form_control_club_zcod">Zip Code</label>
                                        <span class="help-block">The zip code of your club</span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="tel" class="form-control" id="form_control_club_phon" name ="club_phone">
                                        <label for="form_control_club_phon">Phone Number</label>
                                        <span class="help-block">Phone number of your club</span>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-offset-1 col-sm-2">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <input type="text" class="form-control" id="form_control_club_mlim" name ="club_memberlimit">
                                        <label for="form_control_club_mlim">Membership Limit</label>
                                        <span class="help-block">The limit of membership</span>
                                    </div>
                                </div>
                            </div>

                            <div class = "row">
                                <div class = "col-xs-12 col-sm-offset-2 col-sm-3">
                                    <div class="form-group form-md-line-input form-md-floating-label">
                                        <select class="form-control edited" id="form_control_club_type"  name = "club_type">
                                            <option value="" selected></option>
                                            <option value="Closed Club"> Closed Club </option>
                                            <option value="Moderated Club"> Moderated Club </option>
                                            <option value="Open Club"> Open Club </option>
                                            <option value="Privated Club"> Private Club </option>
                                        </select>
                                        <label for="form_control_club_type">Club Type</label>
                                        <span class="help-block">The type of your club</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="submit" class="btn green pull-right"> Club Create </button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script src="/assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="/assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var click = false;
    $(function() {

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

<script src="/js/club/createclub.js" type="text/javascript"></script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.hometemplate', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>