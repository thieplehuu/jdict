@extends('layouts.login')

@section('content')
		        <div class="animate form login_form">
		            <section class="login_content">
		                <form method="post" action="{{ url('/login') }}">
		                    {!! csrf_field() !!}
		                    
		                    <h1>Login Form</h1>
		                    <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
		                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
		                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		                        @if ($errors->has('email'))
		                            <span class="help-block">
		                      <strong>{{ $errors->first('email') }}</strong>
		                </span>
		                        @endif
		                    </div>
		                    
		                    <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
		                        <input type="password" class="form-control" placeholder="Password" name="password">
		                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
		                        @if ($errors->has('password'))
		                            <span class="help-block">
		                  <strong>{{ $errors->first('password') }}</strong>
		                </span>
		                        @endif
		                    
		                    </div>
		                    <div>
		                        <input type="submit" class="btn btn-default submit" value="Sign in">
		                        <a class="reset_pass" href="{{  url('/password/reset') }}">Lost your password?</a>
		                    </div>
		                    
		                    <div class="clearfix"></div>
		                    
		                    <div class="separator">
		                        <p class="change_link">New to site?
		                            <a href="{{ url('/register') }}" class="to_register"> Sign Up </a>
		                        </p>
		                        
		                        <div class="clearfix"></div>
		                        <br />
		                    </div>
		                </form>
		            </section>
		        </div>

@endsection