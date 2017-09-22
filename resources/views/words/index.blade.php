@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default  panel-no-border">
                    <div class="panel-body">
                        <a href="{{ url('/words/create') }}" class="btn btn-success btn-sm" title="Add New Word" style = "margin-bottom: 10px">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                        <a href="{{ url('words/export', ['type' => 'xls', 'category_id' => $category_id, 'search'=> $search]) }}" class="btn btn-success btn-sm" title="Export" style = "margin-bottom: 10px"
>
                            <i class="fa fa-file-excel-o" aria-hidden="true"></i> Export
                        </a>
                        {!! Form::open(['url' => route('words.index'), 'class' => 'navbar-form navbar-right', 'files' => true, 'autocomplete' => 'off', 'method' => 'GET']) !!}
						
						@include ('words.form_search')						
						
						{!! Form::close() !!}
                        </br>
                        </br>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                       <th  style = "min-width: 120px">Word</th><th style = "min-width: 120px">Furigana</th><th style = "min-width: 120px">Related</th><th>Meanings</th><th>Samples</th><th style = "min-width: 140px;
    display: block">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($words as $item)
                                    <tr>                          
                                        <td><a href="{{ url('/words/' . $item->id) }}" title="View Word">{{ $item->word }}</a>
                                        @if ($item->published === 0)                                        
                                        	<a href="{{ url('/words/' . $item->id . '/edit') }}"><span class="badge label label-pill label-danger badge-red">Need Review</span></a>
										@endif 
                                        </td><td>{{ $item->furigana }}                                                                                
                                        </td><td>{{ $item->related }}</td>
                                        <td>
									    	@foreach($item->means as $mean)
									    		<div>
										    		{!! nl2br(e($mean->meaning)) !!}
									    		</div>
									    	@endforeach 
                                        </td>
                                        <td>
                                       		@foreach($item->means as $mean)
									    		<div>
										    		{!! nl2br(e($mean->examples)) !!}
									    		</div>
									    	@endforeach 
                                        </td>
                                        <td>
                                            @if (Auth::user()->role_id == 1)
                                            <a href="{{ url('/words/' . $item->id . '/edit') }}" title="Edit Word"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/words', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Word',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @if (!empty($words))
                            <div class="pagination-wrapper"> {!! $words->appends(Request::except('page'))->links() !!} </div>
                            
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
