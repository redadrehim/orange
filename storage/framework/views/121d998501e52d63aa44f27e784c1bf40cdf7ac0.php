<!-- Key Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('key', 'Key:'); ?>

    <?php echo Form::text('key', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Value Field -->
<div class="form-group col-sm-6 col-lg-12">
    <?php echo Form::label('value', 'Value:'); ?>

    <?php echo Form::text('value', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Icon Field -->

<div class="form-group form-group col-sm-12 col-lg-12">
    <div class="custom-file">
        <input type="file" class="custom-file-input" id="customFile" name="icon">
        <label class="custom-file-label" for="customFile">Icon</label>
    </div>
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
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('settings.index'); ?>" class="btn btn-default">Cancel</a>
</div>
