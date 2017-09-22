@extends('layouts.frontend')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default panel-no-border">
                    <div class="panel-body">
                        <br />
						<!-- 
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
						 -->
                        {!! Form::open(['url' => route('home.index'), 'class' => 'form-horizontal', 'files' => true, 'autocomplete' => 'off', 'method' => 'GET']) !!}

                        @include ('home.form')

                        {!! Form::close() !!}
                        @if (!empty($words))
						<div class="pagination-wrapper"> {!! $words->appends(Request::except('page'))->links() !!} </div>
						@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
