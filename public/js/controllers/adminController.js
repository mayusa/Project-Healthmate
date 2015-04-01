/* Controllers */
'use strict';
var app = angular.module('hmApp', ['userService','ngResource']);

app.config(function($interpolateProvider) {
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

  $scope.delePop = function (id, u){
    $('#confirmBlock').modal('show');
    $scope.blockid = id;
    $scope.blockuser = u;
  };

  $scope.changeStatus = function (uid, u)//need object u(user) !!!
  {
  	var user = User.get({id: uid}, function(user)
    {
        if(user.status == 0)
  			u.status = 1;
  		else
  			u.status = 0

  		User.update({id: uid}, u);
  	});
    // close modal
    $('#confirmBlock').modal('hide');
  }

}]);
