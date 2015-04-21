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


myCtrls.controller('MyFamilyCtrl', ['$scope', '$http', 'Family', function ($scope, $http, Family) 
{

  $scope.init = function() {
      $http({
          url: '/myhealth/family',
          method: "GET"
      })
      .success(function(data){
          // console.log(data);
          $scope.familysall = data;
      });
  };

  $scope.init();

  $scope.deletePop = function(obj, index){
  	$scope.del_member=obj;
  	$scope.index=index;
  	// console.log('pop index',index);
  	$('#confirmDelete').modal('show');
  }

  $scope.deleteMember = function(m,index){
  	// console.log('m: ', m);
  	// console.log('index',index);
		m.user_id = $("#user_id").val();
  	var id = m.id;
  	m.status = 0;
  	$scope.familysall.splice(index,1)
  	Family.update({id: id}, m);
  	// $scope.init(); // 效率低
  	$('#confirmDelete').modal('hide');
  }

}]);

myCtrls.controller('FamilyCreateCtrl', ['$scope', '$http', 'Family', function ($scope, $http, Family) 
{
	$scope.member = {};

	$scope.member.user_id = $("#user_id").val();
	$scope.member.first_name = "";
	$scope.member.last_name = "";
	$scope.member.gender = 1;
	$scope.member.birth = "";
	$scope.err_msg = "Please enter first name of new member";

  // 切记表单元素的id和name都要自定义名称,
  // 不要使用关键词,比如'submit',否则jquery提交可能无效
  $scope.submitMember = function(event,f) {
    if(event){
			f.user_id = $("#user_id").val();
      event.stopPropagation();
      event.preventDefault();
      if($scope.checkInput()){
        // console.log(f);
        Family.save(f);
				$scope.member = {}; // clear data
				$scope.member.gender = 1;

				// $scope.familysall.push($scope.member);
				// console.log($scope.familysall);
  			$scope.init();//临时：刷新页面，效率比较低 但是删除有问题。暂时用
        $('#addUser').modal('hide');

				return false;
      } 

	  	// console.log("false", $scope.member);
	  	return false;
    }
  }

  $scope.checkInput = function() {
  	if($scope.member.first_name == "") {
			$scope.err_msg = "Please enter first name of new member";
		} else if($scope.member.last_name == "") {
			$scope.err_msg = "Please enter last name of new member";
		} else {
			$scope.err_msg = "";
			return true;
		}
			return false;
  }


}]);


myCtrls.controller('MyInsuranceCtrl', ['$scope', '$http', 'Appontment', function ($scope, $http, Appontment) 
{

}]);
