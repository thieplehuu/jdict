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
	<div class = "row" id = "1">
		<div class="panel-custom col-md-10">
			<div class="form-group {{ $errors->has('meaning.0.mean') ? 'has-error' : ''}}">
			    {!! Form::label('meaning.0.mean', 'Meaning', ['class' => 'col-md-4 control-label']) !!}
			    <div class="col-md-8">
			        {!! Form::textarea('meaning[0][mean]', null, ['id' => 'input-mean','class' => 'form-control', 'size' => '30x2']) !!}
			        {!! $errors->first('meaning.0.mean', '<p class="help-block">:message</p>') !!}
			    </div>
			</div>		
			<div class="form-group {{ $errors->has('meaning.0.examples') ? 'has-error' : ''}}">
			    {!! Form::label('meaning.0.examples', 'Examples', ['class' => 'col-md-4 control-label']) !!}
			    <div class="col-md-8">
			        {!! Form::textarea('meaning[0][examples]', null, ['id' => 'input-example','class' => 'form-control', 'size' => '30x5']) !!}
			        {!! $errors->first('meaning.0.examples', '<p class="help-block">:message</p>') !!}
			    </div>
			    
			</div>             
		</div>
		<div class="col-md-2">
	        {!! Form::button('Add', ['id' => 'btn-add-mean-field', 'class' => 'btn btn-primary']) !!}
	    </div>
    </div>
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
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Add Word', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
