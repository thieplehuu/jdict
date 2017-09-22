<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password') ? 'has-error' : ''}}">
    {!! Form::label('password', 'Password', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('password', null, ['class' => 'form-control']) !!}
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : ''}}">
    {!! Form::label('password_confirmation', 'Password Confirm', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::text('password_confirmation', null, ['class' => 'form-control']) !!}
        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('role_id') ? 'has-error' : ''}}">
    {!! Form::label('roles', 'Role', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-9">
        {!! Form::select('role_id',     $roles,     null,     ['class' => 'form-control select2-multiple']) !!}
        {!! $errors->first('role_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
