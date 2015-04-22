<!DOCTYPE html>
<html lang="en" ng-app="hmApp">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>HealthMate | Home</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.css">
	<link rel="stylesheet" href="/lib/magnific-popup/magnific-popup.css">
	<link rel="stylesheet" href="/lib/fontawesome/css/font-awesome.min.css">
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body id="page-top" class="index" ng-cloak>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header page-scroll">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="{{ asset('/') }}">HealthMate</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav text-center">
					<li @if( strpos(Request::url(), '/info/doctors') ) class="active" @endif>
						<a href="{{ url('/info/doctors/home') }}">
							<h1><span class="fa fa-user-md"></span></h1>Doctors
						</a>
					</li>
					<li @if( strpos(Request::url(), '/info/facilities') ) class="active" @endif>
						<a href="{{ url('/info/facilities/home') }}">
							<h1><span class="fa fa-hospital-o"></span></h1>Facilities
						</a>
					</li>
					<li @if( strpos(Request::url(), '/info/conditions') ) class="active" @endif>
						<a href="{{ url('/info/conditions/home') }}"><h1>
							<span class="fa fa-heartbeat"></span></h1>Conditions
						</a>
					</li>
<!-- 					<li>
						<a href="{{ url('/myhealth/appointments/home') }}">
							<h1><span class="fa fa-calendar"></span></h1>Calendar
						</a>
					</li> -->
					<li @if( strpos(Request::url(), '/info/news') ) class="active" @endif>
						<a href="{{ url('/info/news/home') }}">
							<h1><span class="fa fa-newspaper-o"></span></h1>News
						</a>
					</li>
					<li @if( strpos(Request::url(), '/info/hotlines') ) class="active" @endif>
						<a href="{{ url('/info/hotlines') }}"><h1>
							<span class="fa fa-phone"></span></h1>Hotlines
						</a>
					</li>
					<li @if( strpos(Request::url(), '/myhealth') ) class="active" @endif>
						<a href="{{ url('/myhealth/appointments/home') }}">
							<h1><span class="fa fa-medkit"></span></h1>My Health
						</a>
					</li>
				</ul>

				<div class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<a href="{{ url('/auth/login') }}" class="btn btn-primary btn-sm">Login</a>
						<a href="{{ url('/auth/register') }}" class="btn btn-success btn-sm">Register</a>
					@else

						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">

                @if (Auth::user()->rid == 2 || Auth::user()->rid == 3 )
                 <li><a href="/admin/users/home">Admin</a></li>
                @endif
                @if (Auth::user()->rid == 2 || Auth::user()->rid == 3 || Auth::user()->rid == 4 )
                 <li><a href="/cms/news/home">CMS</a></li>
                @endif
                <li><a href="{{ URL('/user/'. Auth::id() . '/profile') }}"><span class="am-icon-user"></span> My Profile</a></li>
                                
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</div>
			</div>
		</div>
	</nav>

	<div class="container">
	@yield('content')
	</div>

<footer class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container">
	<div class="row">
		<h5>
			<div class="text-left col-sm-6"><small>Copyright © 2015 HealthMate. All rights reserved.</small></div>
		</h5>
		<h5>
		  <div class="text-right col-sm-6">
		  <small>
			  <a href="{{ url('/') }}" class>About</a> | 
			  <a href="{{ url('/') }}" class>Tour</a> | 
			  <a href="{{ url('/') }}" class>Feedback</a>
			  </small>
		  </div>
		  </div>
    </h5>
  </div>
</footer>
	<!-- Scripts -->
	<script src="/lib/jquery2/jquery.min.js"></script>
	<script src="/lib/bootstrap/dist/js/bootstrap.js"></script>

	<script src="/lib/underscore/underscore.js"></script>
	<!-- <script src="/lib/bootstrap-calendar/js/calendar.js"></script> -->
  <!-- <script src="/js/myAppointment.js"></script> -->

	<script src="/lib/magnific-popup/jquery.magnific-popup.js"></script>
	<script src="/lib/jquery2/jquery.easing.min.js"></script>
  <!--AngularJS-->
	<script src="/lib/angular/angular.js"></script>
	<script src="/lib/angular/angular-resource.min.js"></script>
	
  <!--ui-bootstrap-angular-->
	<script src="/lib/angular-bootstrap/ui-bootstrap-tpls.min.js"></script>
	<script src="/lib/angular-bootstrap/ui-bootstrap.min.js"></script>
	
  <script src="/js/appinfo.js"></script>  
  <script src="/js/controllers/infoControllers.js"></script>
  <script src="/js/services/infoServices.js"></script>

  <script src="/js/controllers/myControllers.js"></script>
  <script src="/js/services/myServices.js"></script>


  <script src="/js/custom.js"></script>
  <script src="/js/animatedHeader.js"></script>
</body>
</html>
