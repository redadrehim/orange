<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('', ''); ?>

    <?php echo Form::text('code', null, ['class' => 'form-control','disabled'=>'disabled']); ?>

    <?php echo Form::hidden('inventory', 1, ['class' => 'form-control']); ?>

</div>

<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('', ''); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control','disabled'=>'disabled']); ?>

</div>


<!-- Quantity Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('quantity', 'Quantity'); ?>

    <?php echo Form::number('quantity', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<div class="form-group col-sm-6  col-lg-12 kt-switch kt-switch--outline kt-switch--icon kt-switch--warning">
    <?php echo Form::label('in_stock', 'In Stock'); ?>

    <label style="float: right;">
        <?php echo Form::checkbox('in_stock', null); ?>

        <span></span>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('items.index'); ?>" class="btn btn-default">Cancel</a>
</div>
