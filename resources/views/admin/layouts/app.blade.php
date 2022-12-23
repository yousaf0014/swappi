<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('metaTitle') - Swappi</title>
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
		ga('create', 'UA-77908100-1', 'auto');
		ga('send', 'pageview');
		</script>
</head>

<body>
	<div id="0">
	  <nav class="navbar-default navbar-static-side" role="navigation">
	    <div class="sidebar-collapse">
	      <ul class="nav" id="side-menu">
	        <li class="nav-header">
	          <div class="dropdown profile-element text-center">
	          	<a href="{{ url('admin/profile') }}">
		          	<span>
		          		<img alt="image" width="75" class="img-circle" src="{{ asset('uploads/' . Auth::user()->profilePic) }}" />
		          	</span>
		          	<span class="clear">
		          		<span class="block m-t-xs">
		          			<strong class="font-bold">{{ Auth::user()->fName }}</strong>
		          		</span>
	          		</span>
	          	</a>
	          </div>
	        </li>
	        <li class="@if(Request::segment(2) == 'ads' || Request::segment(2) == 'ad') {{ 'active' }} @endif"><a href="{{ url('admin/ads') }}">Ads</a></li>
			<li class="@if(Request::segment(2) == 'categories' || Request::segment(2) == 'category') {{ 'active' }} @endif"><a href="{{ url('admin/categories') }}">Categories</a></li>
			<li class="@if(Request::segment(2) == 'skills' || Request::segment(2) == 'skill') {{ 'active' }} @endif"><a href="{{ url('admin/skills') }}">Skills</a></li>
			<li class="@if(Request::segment(2) == 'users' || Request::segment(2) == 'user') {{ 'active' }} @endif"><a href="{{ url('admin/users') }}">Users</a></li>
			<li class="@if(Request::segment(2) == 'payments' || Request::segment(2) == 'payment') {{ 'active' }} @endif"><a href="{{ url('admin/payments') }}">Payments</a></li>
			<li class="@if(Request::segment(2) == 'packages' || Request::segment(2) == 'package') {{ 'active' }} @endif"><a href="{{ url('admin/packages') }}">Packages</a></li>
			<li class="@if(Request::segment(2) == 'pages' || Request::segment(2) == 'page') {{ 'active' }} @endif"><a href="{{ url('admin/pages') }}">Pages</a></li>
		</ul>
		</div>
	
	  </nav>

		<div id="page-wrapper" class="gray-bg">
		    <div class="row border-bottom">
				<div class="logo-element"><img alt="LOGO" src="{{ asset('images/footer_logo.png') }}" /> </div>
				<nav class="navbar navbar-static-top" role="navigation">
					<ul class="nav navbar-top-links navbar-right">
						<li> <span class="m-r-sm text-muted welcome-message">Welcome, {{ Auth::user()->fName }}</span> </li>
						<li> <a href="{{ url('logout') }}"> <i class="fa fa-sign-out"></i> Log out </a> </li>
	        		</ul>
				</nav>
			</div>
			
			@yield('content')
		</div>
	</div>	


	<script src="{{ asset('js/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
	    
    @yield('scripts')
</body>
</html>