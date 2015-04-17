/* Controllers */
'use strict';
var infoCtrls = angular.module('infoCtrls', ['infoServs','ngResource', 'ui.bootstrap', 'ui.bootstrap.tpls']);

infoCtrls.controller('InfoCtrl', ['$scope', function ($scope) 
{
  //console.log('i am info home page');
}]);

// --- NEWS CONTROLLERS (need ueditor)-------------------------------------------------//

// /info/news/home
infoCtrls.controller('InfoNewsCtrl', ['$scope', '$http',  'News', 'NewsCategory', function ($scope, $http, News, NewsCategory) 
{
  $scope.sortField = "created_at";
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
          console.log("response data", data);

          // bootstrip pagination
          $scope.totalItems =data.total;
          $scope.currentPage = data.current_page;
          $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
          };
          $scope.pageChanged = function() {
            console.log('Page changed to: ' + $scope.currentPage);
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

  $scope.newcatesall = NewsCategory.query();

}]);

// /info/news/{id}/view
infoCtrls.controller('InfoNewsViewCtrl', ['$scope', 'News', function ($scope, News) 
{
  //data comes from laravel 
  var htmlcontent = $(".text-justify").text();
  // transfor text to html
  $(".text-justify").html(htmlcontent);

}]);


// --- FACILITY CONTROLLERS -----------------------------------------------------------//
infoCtrls.controller('InfoFacilityCtrl', ['$scope', 'Facilites', 'FacilitesCategory', function ($scope, Facilites, FacilitesCategory) 
{
  $scope.sortField = "created_at";
  $scope.facilitiesall = Facilites.query();
  $scope.facilitycatesall = FacilitesCategory.query();

}]);


// --- DOCTOR CONTROLLERS -----------------------------------------------------------//
infoCtrls.controller('InfoDoctorCtrl', ['$scope', 'Doctors', 'Specialties', function ($scope, Doctors, Specialties) 
{
  $scope.sortField = "created_at";
  $scope.doctorsall = Doctors.query();
  $scope.specialtiesall = Specialties.query();
}]);

// /info/doctor/{id}/view
infoCtrls.controller('InfoDoctorViewCtrl', ['$scope', 'Specialties', function ($scope, Specialties) 
{
  $scope.specialtyname = "";
  var speciid = $("#speciid").val();
  console.log(speciid);
  Specialties.get({id: speciid}, function(specility)
  {
    $scope.specialtyname = specility.speci_name;
  });

}]);


// --- CONDITION CONTROLLERS -----------------------------------------------------------//
infoCtrls.controller('InfoConditionCtrl', ['$scope', 'Conditions', function ($scope, Conditions) 
{
  $scope.sortField = "created_at";
  $scope.conditionsall = Conditions.query();

  $scope.changeStatus = function (c)//need object n(condition) !!!
  {
    var id = c.id;
    var condition = Conditions.get({id: id}, function(condition)
    {
      if(condition.is_common==1){
        c.is_common = 0;
      }
      else{
        c.is_common = 1
      }
      console.log(c);
      Conditions.update({id: id}, c);
    });
  }
}]);



