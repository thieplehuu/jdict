<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>JDicts! | </title>
        
		<link rel="icon" type="image/gif" href="{{ asset("img/icon.png") }}" />
		
        <!-- Bootstrap -->
        <link href="{{ asset("css/bootstrap.min.css") }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ asset("css/font-awesome.min.css") }}" rel="stylesheet">		
        
        <link href="{{ asset("css/main.css") }}" rel="stylesheet">
        
        <link href="{{ asset("css/select2.min.css") }}" rel="stylesheet">
        
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        
</head>
<body>

  <div id="header">
    <div class="inner">
      <div class = "header-nav">
      	<a href="http://www.softfront.com.vn"><img src="http://www.softfront.com.vn/images/logo-softfront.png" alt="logo"></a>
      	<ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i> {{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="{{ url('/users/' . Auth::user()->id) }}"> Profile</a></li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out pull-right"></i> Sign Out</a></li>
                  </ul>
                </li>
              </ul>
      </div>
    </div>
  </div>

  <div id="pageBody">
    <div id="nav">
		@include('includes/navbar')
    </div>

    <div id="content">
      @yield('content')      
    </div>

  </div>

  <div id="footer">
    <div class="inner">
    	<div class = "footer-nav text-center">
    	<a href="http://softfront.com.vn/" target="_blank">Copyright � 2017 SOFTFRONT VIETNAM CO.,LTD. All Rights Reserved.</a>
     </div>
  </div>
  <!-- jQuery -->
    <script src="{{ asset("js/jquery.min.js") }}"></script>
    <script src="{{ asset("js/jquery-ui.min.js") }}"></script>
    <script src="{{ asset("js/bootstrap-typeahead.min.js") }}"></script>    
    <script src="{{ asset("js/select2.min.js") }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset("js/bootstrap.min.js") }}"></script>
	<script src="{{ asset("js/main.js") }}"></script>
    @stack('scripts')
</body></html>