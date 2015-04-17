/* Controllers */
'use strict';
var infoCtrls = angular.module('infoCtrls', ['infoServs','ngResource']);

infoCtrls.controller('InfoCtrl', ['$scope', function ($scope) 
{
  //console.log('i am info home page');
}]);

// --- NEWS CONTROLLERS (need ueditor)-------------------------------------------------//

// /info/news/home
infoCtrls.controller('InfoNewsCtrl', ['$scope', 'News', 'NewsCategory', function ($scope, News, NewsCategory) 
{
  $scope.sortField = "created_at";
  $scope.newsall = News.query();
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



