<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('name', 'Name:'); ?>

    <?php echo Form::text('name', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('description', 'Description:'); ?>

    <?php echo Form::textarea('description', null, ['class' => 'form-control summernote']); ?>

</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('service_id', 'Service:'); ?>

    <?php echo Form::select('service_id', $services, old('service_id'), ['class' => 'custom-select form-control','disabled' =>false]); ?>

</div>

<!-- Content Source Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('source', 'Content Source:'); ?>

    <?php echo Form::select('source', $sources, old('source'), ['class' => 'custom-select form-control','disabled' =>false]); ?>

</div>

<!-- Source URL Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('url', 'Source URL:'); ?>

    <?php echo Form::text('url', null, ['class' => 'form-control']); ?>

</div>

<!-- Google Search Key Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('search_key', 'Goole Search Key String:'); ?>

    <?php echo Form::text('search_key', null, ['class' => 'form-control']); ?>

</div>



<!-- Status Field -->
<div class="form-group col-sm-6  col-lg-12 kt-switch kt-switch--outline kt-switch--icon kt-switch--warning">
    <?php echo Form::label('status', 'Status'); ?>

    <label style="float: right;">
        <?php echo Form::checkbox('status', null); ?>

        <span></span>
    </label>
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    <?php echo Form::submit('Save', ['class' => 'btn btn-primary']); ?>

    <a href="<?php echo route('categories.index'); ?>" class="btn btn-default">Cancel</a>
</div>
