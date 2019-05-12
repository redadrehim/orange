<!-- Slug Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('slug', 'Slug'); ?>

    <?php echo Form::text('slug', null, ['class' => 'form-control']); ?>

</div>

<!-- Title Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('title', 'Title'); ?>

    <?php echo Form::text('title', null, ['class' => 'form-control']); ?>

</div>

<!-- Content Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('content', 'Content'); ?>

    <?php echo Form::textarea('content', null, ['class' => 'form-control summernote']); ?>

</div>


<!-- Page Id Field -->
<div class="form-group col-sm-12">
    <?php echo Form::select('page_id', $pages, old('page_id'), ['id'=>'kt_select2_8','class' => ' m-select2 form-control','disabled' =>false]); ?>

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

    <a href="<?php echo route('sections.index'); ?>" class="btn btn-default">Cancel</a>
</div>
