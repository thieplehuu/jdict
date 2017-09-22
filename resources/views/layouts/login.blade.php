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
</head>
<body>

<div id="header">
<div class="inner">
      <div class = "header-nav">
      	<a href="http://www.softfront.com.vn"><img src="http://www.softfront.com.vn/images/logo-softfront.png" alt="logo"></a>
      </div>
    </div>
</div>

<div id="pageBody">

<div id="login_wrapper">
@yield('content')
</div>

</div>

<div id="footer">
<div class="inner">
    	<div class = "footer-nav  text-center">
    	<a href="http://softfront.com.vn/" target="_blank">Copyright © 2014 - 2017 SOFTFRONT VIETNAM CO.,LTD. All Rights Reserved.</a>    	</div>
    </div>
</div>
<!-- jQuery -->
<script src="{{ asset("js/jquery.min.js") }}"></script>
<!-- Bootstrap -->
<script src="{{ asset("js/bootstrap.min.js") }}"></script>
@stack('scripts')
</body></html>