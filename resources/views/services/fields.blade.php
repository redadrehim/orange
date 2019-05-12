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
    <a href="{!! route('services.index') !!}" class="btn btn-default">Cancel</a>
</div>
