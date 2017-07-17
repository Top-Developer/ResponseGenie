<?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<?php if($message = Session::get('success')): ?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong><?php echo e($message); ?></strong>
    </div>
    <img src="images/<?php echo e(Session::get('image')); ?>">
<?php endif; ?>
<form class = "form-horizontal" action = "<?php echo e(url('/event/configure')); ?>" method = "post" enctype = 'multipart/form-data'>
    <input type = 'hidden' name = 'active_tab' value = 'tab_2_3'>
    <?php echo e(csrf_field()); ?>

    <h1 style="text-align: center;">
        Configure event
    </h1>
    <div class = "row">
        <div class = "col-md-6">
            <div class="row form-group">
                <label class="col-md-4 control-label" for = "event_name">Event Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Event Name" id = "event_name" name = "event_name" value = "<?php echo e($event -> name); ?>">
                </div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class="row form-group">
                <label class="col-md-4 control-label" for = "event_slug">Event Slug</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Evnt Slug" id = "event_slug" name = "event_slug" value = "<?php echo e($event -> slug); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "event_desc_pub">Event Description<br>( Public )</label>
            <div class="col-md-9">
                <textarea class="form-control" rows = "5" placeholder="Event Description" id = "event_desc_pub" name = "event_desc_pub"><?php echo e($event -> description); ?></textarea>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "event_desc_prv">Event Description<br>( Members Only )</label>
            <div class="col-md-9">
                <textarea class="form-control" rows = "5" placeholder="Event Description" id = "event_desc_prv" name = "event_desc_prv"><?php echo e($event -> short_description); ?></textarea>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "event_logo">event Logo</label>
            <div class = "col-md-3">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;">
                        <img src = '<?php echo e($event -> logo_path); ?>'>
                    </div>
                    <div>
                                                                    <span class="btn red btn-outline btn-file">
                                                                        <span class="fileinput-new"> Change image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="file" name="cevent_logo"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                    </div>
                </div>
            </div>
            <div class = 'col-md-6'>
                <div class = "row form-group">
                    <label class="col-md-4 control-label" for = "zip_code">Zip Code</label>
                    <div class = "col-md-4">
                        <input type="text" class="form-control" placeholder="Zip Code" id = "zip_code"  name = "zip_code" value = "<?php echo e($theContact -> zipcode); ?>">
                    </div>
                </div>
                <div class = "row form-group">
                    <label class="col-md-4 control-label" for = "event_access">Event Access</label>
                    <div class = "col-md-4">
                        <select type="text" class="form-control" id = "event_access"  name = "event_access">
                            <option <?php if($event -> access == 'Public'): ?><?php echo e('selected'); ?><?php endif; ?>>Public</option>
                            <option <?php if($event -> access == 'Members Only'): ?><?php echo e('selected'); ?><?php endif; ?>>Members Only</option>
                            <option <?php if($event -> access == 'Private'): ?><?php echo e('selected'); ?><?php endif; ?>>Private</option>
                        </select>
                    </div>
                    <div class = "col-md-4">
                        <button type="submit" class="btn green" style = 'float:right; margin-right:30px;'>Submit</button>
                    </div>
                </div>
                <div class = "row form-group">
                    <div class = "col-md-offset-4 col-md-8">
                        <input type="checkbox" id = "display_guest" name = "dg">
                        <label for = "display_guest">Display guest list to all guests?</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>