<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('name', 'Name:'); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control','required' => 'required']); ?>

</div>

<!-- Email Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('email', 'Email:'); ?>

    <?php echo Form::email('email', null, ['class' => 'form-control']); ?>

</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('mobile', 'Mobile:'); ?>

    <?php echo Form::number('mobile', null, ['class' => 'form-control','required' => 'required']); ?>

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

    <a href="<?php echo route('users.index'); ?>" class="btn btn-default">Cancel</a>
</div>
