/* Controllers */
'use strict';
var app = angular.module('hmApp', ['userService','ngResource'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});


app.controller('AdminCtrl', ['$scope', function ($scope) {
  //console.log('i am admin home page');
}]);

app.controller('AdminUsersCtrl', ['$scope', '$resource', 'User', function ($scope, $resource, User) {
  $scope.users = User.query();

  $scope.nav1 = 1;
  $scope.nav2 = 0;
    $scope.sortField = '';
  $scope.changeStatus = function (userid, u)
  {
  	var user = User.get({id: userid}, function(user)
    {
  		if(user.status == 0)
  			u.status = 1;
  		else
  			u.status = 0

  		User.update({id: userid}, u);
  	});
  }

}]);
