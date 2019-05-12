<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('name', 'Name:'); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Thumbnail Field -->
<div class="form-group form-group col-sm-12 col-lg-12">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="thumbnail">
        <label class="custom-file-label" for="customFile">Thumbnail</label>
    </div>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('description', 'Description'); ?>

    <?php echo Form::textarea('description', null, ['class' => 'form-control summernote']); ?>

</div>

<!-- Status Field -->
<div class="form-group col-sm-6  col-lg-12 kt-switch kt-switch--outline kt-switch--icon kt-switch--warning">
    <?php echo Form::label('status', 'Status'); ?>

    <label style="float: right;">
        <?php echo Form::checkbox('status'); ?>

        <span></span>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('brands.index'); ?>" class="btn btn-default">Cancel</a>
</div>
