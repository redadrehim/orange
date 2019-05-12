<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','required'=>'required']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control summernote']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('service_id', 'Service:') !!}
    {!! Form::select('service_id', $services, old('service_id'), ['class' => 'custom-select form-control','disabled' =>false]) !!}
</div>

<!-- Content Source Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('source', 'Content Source:') !!}
    {!! Form::select('source', $sources, old('source'), ['class' => 'custom-select form-control','disabled' =>false]) !!}
</div>

<!-- Source URL Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('url', 'Source URL:') !!}
    {!! Form::text('url', null, ['class' => 'form-control']) !!}
</div>

<!-- Google Search Key Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('search_key', 'Goole Search Key String:') !!}
    {!! Form::text('search_key', null, ['class' => 'form-control']) !!}
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
    <a href="{!! route('categories.index') !!}" class="btn btn-default">Cancel</a>
</div>
