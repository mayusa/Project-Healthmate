<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body ng-app="myApp">
<div>
	<input type="text" ng-model="ashu">
	{{ ashu }}
</div>
<div class="main-container" ng-view></div>
	<script src="/lib/angular/angular.js"></script>
	<script src="/lib/angular/angular-resource.min.js"></script>
	<script src="/js/app.js"></script>
	<script src="/js/controllers/adminController.js"></script>
	<!--
	<script src="/js/filters.js"></script>
	<script src="/js/directives.js"></script>
	<script src="/js/date.js"></script>
	<script src="/lib/angular/ui_bootstrap.js"></script>
	<script src="/lib/angular/ui-bootstrap-tpls-0.9.0.min.js"></script>
	<script src="/js/underscore.js"></script>
	-->
	<script>
	angular.module("myApp").constant("CSRF_TOKEN", '<?php echo csrf_token(); ?>');
	</script>
</body>