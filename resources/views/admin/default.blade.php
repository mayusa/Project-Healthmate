<!DOCTYPE html>
<html lang="en" ng-app="hmApp">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
	<title>HealthMate Admin Dashboard</title>

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
<body ng-controller="AdminCtrl" ng-cloak>
	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">HealthMate Admin Dashboard</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav" id="nav">
					<li	@if(strstr(Request::url(), '/admin') == '/admin') class="active"
					@endif >
					<a href="{{ url('/admin') }}">Admin Home</a></li>
          <li @if(strstr(Request::url(), '/admin') == '/admin/users/home') class="active"
					@endif>
					<a href="/admin/users/home">Users</a></li>
				</ul>

				<div class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
                <li><a href="{{ URL('/user/'. Auth::id() . '/profile') }}"><span class="am-icon-user"></span> My Profile</a></li>
                <li><a href="/">Back Home</a></li>
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
				</div>
			</div>
		</div>
	</nav>

	<div class="container">
	@yield('content')
	</div>

	<!-- Scripts -->
	<script src="/lib/jquery2/jquery.min.js"></script>
	<script src="/lib/bootstrap/dist/js/bootstrap.js"></script>
	<script src="/lib/magnific-popup/jquery.magnific-popup.js"></script>
  <!--AngularJS-->

	<script src="/lib/angular/angular.js"></script>
	<script src="/lib/angular/angular-resource.min.js"></script>
  <!--<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
  <script src="https://code.angularjs.org/1.3.15/angular-resource.min.js"></script>-->

  <script src="/js/controllers/adminController.js"></script>
  <script src="/js/services/adminUsersService.js"></script>
  <script src="/js/custom.js"></script>


</body>
</html>
