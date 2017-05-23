<form class = "form-horizontal ajax" action = "<?php echo e(url('/club/configure')); ?>" method = "post">
    <?php echo e(csrf_field()); ?>

    <h1 style="text-align: center;">
        Configure club
    </h1>
    <div class = "row">
        <div class = "col-md-6">
            <div class="form-group">
                <label class="col-md-4 control-label" for = "club_name">Club Name</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Club Name" id = "club_name" name = "club_name" value = "<?php echo e($theClub -> name); ?>">
                </div>
            </div>
        </div>
        <div class = "col-md-6">
            <div class="form-group">
                <label class="col-md-4 control-label" for = "club_slug">Club Slug</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="Club Slug" id = "club_slug" name = "club_slug" value = "<?php echo e($theClub -> slug); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "club_desc_pub">Club Description<br>( Public )</label>
            <div class="col-md-9">
                <textarea class="form-control" rows = "5" placeholder="Club Description" id = "club_desc_pub" name = "club_desc_pub"><?php echo e($theClub -> description); ?></textarea>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "club_desc_prv">Club Description<br>( Members Only )</label>
            <div class="col-md-9">
                <textarea class="form-control" rows = "5" placeholder="Club Description" id = "club_desc_prv" name = "club_desc_prv"><?php echo e($theClub -> short_description); ?></textarea>
            </div>
        </div>
    </div>
    <div class = "row">
        <div class="form-group">
            <label class="col-md-2 control-label" for = "club_logo">Club Logo</label>
            <div class = "col-md-4">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"> </div>
                    <div>
                                                                    <span class="btn red btn-outline btn-file">
                                                                        <span class="fileinput-new"> Select image </span>
                                                                        <span class="fileinput-exists"> Change </span>
                                                                        <input type="hidden"><input type="file" name="club_logo"> </span>
                        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                    </div>
                </div>
            </div>
            <div class = "col-md-6">
                <div class = "row">
                    <div class = "form-group">
                        <label class="col-md-4 control-label" for = "zip_code">Zip Code</label>
                        <div class = "col-md-4">
                            <input type="text" class="form-control" placeholder="Zip Code" id = "zip_code"  name = "zip_code" value = "<?php echo e($theClub -> contact -> zipcode); ?>">
                        </div>
                    </div>
                </div>
                <div class = "row">
                    <div class = "form-group">
                        <label class="col-md-4 control-label" for = "club_type">Club Type</label>
                        <div class = "col-md-4">
                            <select type="text" class="form-control" id = "club_type"  name = "club_type">
                                <option <?php if($theClub -> type == 'Closed Club'): ?><?php echo e('selected'); ?><?php endif; ?>>Closed Club</option>
                                <option <?php if($theClub -> type == 'Moderated Club'): ?><?php echo e('selected'); ?><?php endif; ?>>Moderated Club</option>
                                <option <?php if($theClub -> type == 'Open Club'): ?><?php echo e('selected'); ?><?php endif; ?>>Open Club</option>
                                <option <?php if($theClub -> type == 'Privated Club'): ?><?php echo e('selected'); ?><?php endif; ?>>Privated Club</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class = "row">
                    <div class = "form-group">
                        <div class = "col-md-offset-6 col-md-6">
                            <button type="submit" class="btn green">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>