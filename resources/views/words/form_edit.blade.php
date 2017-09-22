<div class="form-group {{ $errors->has('word') ? 'has-error' : ''}}">
    {!! Form::label('word', 'Word', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::text('word', null, ['class' => 'form-control']) !!}
        {!! $errors->first('word', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}">
    {!! Form::label('categories', 'Categories', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::select('category_list[]',     $categories,     null,     ['class' => 'form-control select2-multiple',     'multiple' => 'multiple']) !!}
        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('furigana') ? 'has-error' : ''}}">
    {!! Form::label('furigana', 'Furigana', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::text('furigana', null, ['class' => 'form-control']) !!}
        {!! $errors->first('furigana', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('related') ? 'has-error' : ''}}">
    {!! Form::label('related', 'Related', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-7">
        {!! Form::text('related', null, ['class' => 'form-control']) !!}
        {!! $errors->first('related', '<p class="help-block">:message</p>') !!}
    </div>
</div>  

<div id = "add-meain-fields-wrap" class="form-group">
	{!! Form::listMeaning('meanings') !!}
</div>

<div class="form-group {{ $errors->has('related') ? 'has-error' : ''}}">
    {!! Form::label('published', 'I Need Review', ['class' => 'col-md-3 control-label']) !!}
    <div class="col-md-2">
        {!! Form::checkbox('published', null, ['class' => 'form-control']) !!}
        {!! $errors->first('published', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Add Data', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
