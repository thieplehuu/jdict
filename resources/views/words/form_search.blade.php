
<div class="form-group">
<div class="col-md-5">

{!! Form::text('search', $search, ['class' => 'form-control col-md-12 ', 'autocomplete' => 'off']) !!}
	
</div>
<div class="col-md-5">
{!! Form::select('category_id',     $categories,     $category_id,     ['class' => 'form-control']) !!}
{!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
</div>
{!! Form::submit('Search', ['class' => 'btn btn-primary']) !!}
</div>
