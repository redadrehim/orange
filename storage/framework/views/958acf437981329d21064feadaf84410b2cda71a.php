<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    <?php echo Form::label('title', 'Title'); ?>

    <?php echo Form::text('title', null, ['class' => 'form-control','required'=>'required']); ?>

</div>

<!-- Thumbnail Field -->
<div class=" form-group col-sm-12 col-lg-12 custom-file">
    <input type="file" class="custom-file-input" id="customFileThumbnail" name="thumbnail">
    <label class="custom-file-label" for="customFileThumbnail">Thumbnail</label>
</div>

<!-- Poster Field -->
<div class=" form-group col-sm-12 col-lg-12 custom-file">
    <input type="file" class="custom-file-input" id="customFilePoster" name="poster">
    <label class="custom-file-label" for="customFilePoster">Poster</label>
</div>

<!-- Brief Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('brief', 'Brief'); ?>

    <?php echo Form::textarea('brief', null, ['class' => 'form-control summernote','required'=>'required']); ?>

</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    <?php echo Form::label('description', 'Description'); ?>

    <?php echo Form::textarea('description', null, ['class' => 'form-control summernote','required'=>'required']); ?>

</div>

<!-- Category  Field -->
<div class="form-group col-sm-12">
    <?php echo Form::label('category_id', 'Cagteogry'); ?>

    <?php echo Form::select('category_id', $categories, old('category_id'), ['class' => 'custom-select form-control','disabled' =>false]); ?>


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

    <a href="<?php echo route('items.index'); ?>" class="btn btn-default">Cancel</a>
</div>
