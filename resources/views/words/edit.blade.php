@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default panel-no-border">
                    <div class="panel-body">
                        <a href="#" onclick="history.back();" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
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
                        {!! Form::model($word, [
                            'method' => 'PATCH',
                            'url' => ['/words', $word->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('words.form_edit', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
