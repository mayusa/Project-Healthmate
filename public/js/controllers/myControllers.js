/* Controllers */
'use strict';
var myCtrls = angular.module('myCtrls', [
  'myServs',
  'ngResource', 
  'ui.bootstrap', 
  'ui.bootstrap.tpls'
  ]);

myCtrls.controller('MyHealthCtrl', ['$scope', function ($scope) 
{
  //console.log('i am info home page');
}]);

// ---  CONTROLLERS (need ueditor)-------------------------------------------------//

myCtrls.controller('MyAppointmentCtrl', ['$scope', '$http', 'Appontment', function ($scope, $http, Appontment) 
{

}]);


myCtrls.controller('MyConditionCtrl', ['$scope', '$http', 'Appontment', function ($scope, $http, Appontment) 
{

}]);


myCtrls.controller('MyFamilyCtrl', ['$scope', '$http', 'Appontment', function ($scope, $http, Appontment) 
{

}]);


myCtrls.controller('MyInsuranceCtrl', ['$scope', '$http', 'Appontment', function ($scope, $http, Appontment) 
{

}]);
