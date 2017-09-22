@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">
			
            <div class="col-md-12">
               
            @if(!empty($word))
                <div class="panel panel-default panel-no-border" style = "margin-top: 20px">
                    <a href="#" onclick="history.back();" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
         
                    <div class="panel-heading"><h3>{{ $word->word }}</h3></div>
                    <div class="panel-body">

                                                
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> Word </th><td> {{ $word->word }} </td></tr><tr><th> Furigana </th><td> {{ $word->furigana }} </td></tr><tr><th> Related </th><td> {{ $word->related }} </td></tr>
									<tr><th> Categories</th>
									<td>
								    	@foreach($word->categories as $category)
								    		<div>
									    		<p>{{$category->name}}</p>
								    		</div>
								    	@endforeach 									
									<td></tr>
									<tr><th> Meanings </th>
									<td>
										<?php $i = 1; ?>
								    	@foreach($word->means as $mean)
								    		<div>
									    		<p>Mean: {{$mean->meaning}}</p>
									    		<p>Sample</p>
									    		{{$mean->examples}}
								    		</div>
								    	@endforeach 
									</td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                @else
                
                <div class="panel panel-default panel-no-border" style = "margin-top: 20px">
                    <a href="#" onclick="history.back();" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
         
                    <div class="panel-heading"><h3>{{ $related }}</h3></div>
                    <div class="panel-body">
                        <br/>
                        <br/>
						<p>This word has not been defined!</p>
						<p>Do you like define it? <a href="{{ url('/home/add_word/' .$related) }}">Add Word</a></p>
                    </div>
                </div>
                
                @endif
            </div>
        </div>
    </div>
@endsection
