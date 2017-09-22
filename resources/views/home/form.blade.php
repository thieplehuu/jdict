<div class = "row">
	<div class="form-group">
	    <div class="col-md-7 form-group">
	         <div class="col-md-12" style = "padding-left:0px; padding-right: 0px">	         		
	            <div id="custom-search-input">
	            	<div class = "input-group">
		        	{!! Form::text('search', $search, ['id' => 'autocomplete-ajax', 'class' => 'form-control select2-ajax input-lg search_input', 'autocomplete' => 'off', 'placeholder' => '日本, nihon, Nhật Bản']) !!}
	                
	                <span class="input-group-btn">
	                    <button class="btn btn-info btn-lg" type="button" onclick="clearSearchText()">
	                            <i class="glyphicon glyphicon-search"></i>
	                    </button>
	                </span>
	                 </div>
	             </div>
             </div>
	    </div>    
		<div class="col-md-3 form-group">
		        {!! Form::select('category_id',     $categories,     $category_id,     ['class' => 'form-control input-lg']) !!}
		        {!! $errors->first('category_id', '<p class="help-block">:message</p>') !!}
		</div>
	    <div class="col-md-2 form-group">{!! Form::submit('Search', ['class' => 'btn btn-primary input-lg']) !!}
	    </div>
	</div>
</div>
<div class = "row">
	@foreach($words as $word)
    	@if (Auth::user())
    	<h3><a href = "{{ url('/words/' . $word->id) }}">{{ $word->word }}</a></h3>
    	@else 	
    	<h3><a href = "{{ url('/words/detail/' . $word->id) }}">{{ $word->word }}</a></h3>
    	@endif
    	<p> Furigana: {{ $word->word }}</p>
    	<p> Related: 
			  @foreach(explode('、', $word->related) as $rel) 
			    <a href = "{{ url('/words/related/' . $rel) }}">{{ $rel }}</a>
			    @if (!$loop->last)					
			    	{{'、'}}
			    @endif
			  @endforeach			  
    	@if (count($word->means) > 1)
    	<?php $i = 1; ?>
    	@endif
    	@foreach($word->means as $mean)
    		<div class = "col-md-12 panel-custom form-group">
    			@if (count($word->means) > 1)
    			<p>{{ $i ++ }}</p>
    			@endif
	    		<p>Mean: {{$mean->meaning}}</p>
	    		<p>Sample</p>
	    		{{$mean->examples}}
    		</div>
    	@endforeach 
	@endforeach 
</div>

