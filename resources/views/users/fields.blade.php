<!-- Name Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Mobile Field -->
<div class="form-group col-sm-6  col-lg-12">
    {!! Form::label('mobile', 'Mobile:') !!}
    {!! Form::number('mobile', null, ['class' => 'form-control','required' => 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-6  col-lg-12 kt-switch kt-switch--outline kt-switch--icon kt-switch--warning">
    {!! Form::label('status', 'Status') !!}
    <label style="float: right;">
        {!! Form::checkbox('status') !!}
        <span></span>
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
