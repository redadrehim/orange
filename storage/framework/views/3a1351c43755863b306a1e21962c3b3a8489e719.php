<!-- Slug Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('slug', 'Slug'); ?>

    <?php echo Form::text('slug', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Title Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('title', 'Title'); ?>

    <?php echo Form::text('title', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Content Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('content', 'Content'); ?>

    <?php echo Form::textarea('content', null, ['class' => 'form-control summernote']); ?>

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

    <a href="<?php echo route('pages.index'); ?>" class="btn btn-default">Cancel</a>
</div>
