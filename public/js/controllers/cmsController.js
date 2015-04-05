/* Controllers */
'use strict';
var app = angular.module('hmApp', ['newsService','newsCagetoryService','conditionsService','facilitiesService','doctorsService','ngResource']);

app.config(function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

app.controller('CmsCtrl', ['$scope', function ($scope) {
  //console.log('i am admin home page');
}]);

app.controller('CmsNewsCtrl', ['$scope', '$resource', 'News', 'NewsCategory', function ($scope, $resource, News, NewsCategory) {
  $scope.newsall = News.query();
  $scope.newcatesall = NewsCategory.query();
  //console.log($scope.newsall);

}]);
