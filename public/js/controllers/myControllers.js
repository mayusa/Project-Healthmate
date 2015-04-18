/* Controllers */
'use strict';
var myCtrls = angular.module('myCtrls', [
  'infoServs',
  'ngResource', 
  'ui.bootstrap', 
  'ui.bootstrap.tpls'
  ]);

myCtrls.controller('MyHealthCtrl', ['$scope', function ($scope) 
{
  //console.log('i am info home page');
}]);

// --- NEWS CONTROLLERS (need ueditor)-------------------------------------------------//

// /info/news/home
myCtrls.controller('InfoNewsCtrl', ['$scope', '$http', 'News', 'NewsCategory', function ($scope, $http, News, NewsCategory) 
{
  $scope.sortField = "created_at";
  $scope.newcatesall = NewsCategory.query();

  // $scope.newsall = News.query();
  // pagination;
  $scope.newsall = [];
  $scope.lastpage=1;

  $scope.init = function() {
      $http({
          url: '/info/news/angular',
          method: "GET",
          params: {page:  $scope.lastpage}
      })
      .success(function(data){
          $scope.newsall = data.data;
          $scope.currentpage = data.current_page;
          //console.log("response data", data);

          // bootstrip pagination
          $scope.totalItems =data.total;
          $scope.currentPage = data.current_page;
          $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
          };
          $scope.pageChanged = function() {
            //console.log('Page changed to: ' + $scope.currentPage);
            $scope.lastpage = $scope.currentPage;
            $scope.init();
          };
          $scope.maxSize = 5;
          $scope.bigTotalItems = data.total;
          $scope.bigCurrentPage = 1;
          // end pagination
      });
  };

  $scope.init();

}]);

// /info/news/{id}/view
myCtrls.controller('InfoNewsViewCtrl', ['$scope', 'News', function ($scope, News) 
{
  //data comes from laravel 
  var htmlcontent = $(".text-justify").text();
  // transfor text to html
  $(".text-justify").html(htmlcontent);

}]);


// --- FACILITY CONTROLLERS -----------------------------------------------------------//
myCtrls.controller('InfoFacilityCtrl', ['$scope', '$http', 'Facilites', 'FacilitesCategory', function ($scope, $http, Facilites, FacilitesCategory) 
{
  $scope.sortField = "created_at";
  // $scope.facilitiesall = Facilites.query();
  $scope.facilitycatesall = FacilitesCategory.query();

        // pagination;
  $scope.facilitiesall = [];
  $scope.lastpage=1;

  $scope.init = function() {
      $http({
          url: '/info/facilities/angular',
          method: "GET",
          params: {page:  $scope.lastpage}
      })
      .success(function(data){
          $scope.facilitiesall = data.data;
          $scope.currentpage = data.current_page;
          //console.log("response data", data);

          // bootstrip pagination
          $scope.totalItems =data.total;
          $scope.currentPage = data.current_page;
          $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
          };
          $scope.pageChanged = function() {
            //console.log('Page changed to: ' + $scope.currentPage);
            $scope.lastpage = $scope.currentPage;
            $scope.init();
          };
          $scope.maxSize = 5;
          $scope.bigTotalItems = data.total;
          $scope.bigCurrentPage = 1;
          // end pagination
      });

  };

  $scope.init();

}]);


// --- DOCTOR CONTROLLERS -----------------------------------------------------------//
myCtrls.controller('InfoDoctorCtrl', ['$scope', '$http', 'Doctors', 'Specialties', function ($scope, $http, Doctors, Specialties) 
{
  $scope.sortField = "created_at";
  // $scope.doctorsall = Doctors.query();
  $scope.specialtiesall = Specialties.query();

    // pagination;
  $scope.doctorsall = [];
  $scope.lastpage=1;

  $scope.init = function() {
      $http({
          url: '/info/doctors/angular',
          method: "GET",
          params: {page:  $scope.lastpage}
      })
      .success(function(data){
          $scope.doctorsall = data.data;
          $scope.currentpage = data.current_page;
          //console.log("response data", data);

          // bootstrip pagination
          $scope.totalItems =data.total;
          $scope.currentPage = data.current_page;
          $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
          };
          $scope.pageChanged = function() {
            //console.log('Page changed to: ' + $scope.currentPage);
            $scope.lastpage = $scope.currentPage;
            $scope.init();
          };
          $scope.maxSize = 5;
          $scope.bigTotalItems = data.total;
          $scope.bigCurrentPage = 1;
          // end pagination
      });

  };

  $scope.init();

}]);

// /info/doctor/{id}/view
myCtrls.controller('InfoDoctorViewCtrl', ['$scope', 'Specialties', function ($scope, Specialties) 
{
  $scope.specialtyname = "";
  var speciid = $("#speciid").val();
  //console.log(speciid);
  Specialties.get({id: speciid}, function(specility)
  {
    $scope.specialtyname = specility.speci_name;
  });

}]);


// --- CONDITION CONTROLLERS -----------------------------------------------------------//
myCtrls.controller('InfoConditionCtrl', ['$scope', '$http' ,'Conditions', function ($scope, $http,  Conditions) 
{
  $scope.sortField = "created_at";
  // $scope.conditionsall = Conditions.query();

      // pagination;
  $scope.conditionsall = [];
  $scope.lastpage=1;

  $scope.init = function() {
      $http({
          url: '/info/conditions/angular',
          method: "GET",
          params: {page:  $scope.lastpage}
      })
      .success(function(data){
          $scope.conditionsall = data.data;
          $scope.currentpage = data.current_page;
          //console.log("response data", data);

          // bootstrip pagination
          $scope.totalItems =data.total;
          $scope.currentPage = data.current_page;
          $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
          };
          $scope.pageChanged = function() {
            //console.log('Page changed to: ' + $scope.currentPage);
            $scope.lastpage = $scope.currentPage;
            $scope.init();
          };
          $scope.maxSize = 5;
          $scope.bigTotalItems = data.total;
          $scope.bigCurrentPage = 1;
          // end pagination
      });

  };

  $scope.init();


}]);



