<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class' => 'form-control','required'=>'required']) !!}
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
    {!! Form::label('brief', 'Brief') !!}
    {!! Form::textarea('brief', null, ['class' => 'form-control summernote','required'=>'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control summernote','required'=>'required']) !!}
</div>

<!-- Category  Field -->
<div class="form-group col-sm-12">
    {!! Form::label('category_id', 'Cagteogry') !!}
    {!! Form::select('category_id', $categories, old('category_id'), ['class' => 'custom-select form-control','disabled' =>false]) !!}

</div>


<!-- Status Field -->
<div class="form-group col-sm-6  col-lg-12 kt-switch kt-switch--outline kt-switch--icon kt-switch--warning">
    {!! Form::label('status', 'Status') !!}
    <label style="float: right;">
        {!! Form::checkbox('status', null) !!}
        <span></span>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('items.index') !!}" class="btn btn-default">Cancel</a>
</div>
