@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Word {{ $word->id }}</div>
                    <div class="panel-body">

                        <a href="#" onclick="history.back();" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/words/' . $word->id . '/edit') }}" title="Edit Word"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['words', $word->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Word',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $word->id }}</td>
                                    </tr>
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
								    			<p>{{ $i ++ }}</p>
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
            </div>
        </div>
    </div>
@endsection
