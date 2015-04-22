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

 // myhealth appointment ---------------------------------------------------------------------//
myCtrls.controller('MyAppointmentCtrl', ['$scope', '$http', 'Appointment', 'Family', function ($scope, $http, Appointment, Family ) 
{
  $scope.init = function() 
  {
    $http({
        url: '/myhealth/appointments',
        method: "GET"
    })
    .success(function(data){
        // console.log(data);
        $scope.appointmentsall = data;
    }); // ok

    // family members
    $http({
        url: '/myhealth/family',
        method: "GET"
    })
    .success(function(data2){
        // console.log(data);
        $scope.familysall = data2;
    });


  };

  $scope.init();

  $scope.deletePop = function(obj, index){
  	$scope.del_item=obj;
  	$scope.index=index;
  	// console.log('pop index',index);
  	$('#confirmDelete').modal('show');
  }

  $scope.deleteItem = function(a,index){
  	// console.log('a: ', a);
  	// console.log('index',index);
		a.user_id = $("#user_id").val();
  	var id = a.id;
  	a.status = 0;
  	$scope.appointmentsall.splice(index,1)
  	Appointment.update({id: id}, a);
  	// $scope.init(); // 效率低
  	$('#confirmDelete').modal('hide');
  }

}]);

myCtrls.controller('AppointmentCreateCtrl', ['$scope', '$http', 'Appointment', function ($scope, $http, Appointment) 
{

	//date picker
	$scope.today = function() {
    $scope.appointment_date = new Date();
  };

  // $scope.today();

  $scope.clear = function () {
    $scope.appointment_date = null;
  };

  // Disable weekend selection
  $scope.disabled = function(date, mode) {
    return ( mode === 'day' && ( date.getDay() === 0 || date.getDay() === 6 ) );
  };

  $scope.toggleMin = function() {
    $scope.minDate = $scope.minDate ? null : new Date();
  };
  $scope.toggleMin();

  $scope.open = function($event) {
    $event.preventDefault();
    $event.stopPropagation();

    $scope.opened = true;
  };

  $scope.dateOptions = {
    formatYear: 'yy',
    startingDay: 1
  };

  $scope.formats = ['MM/dd/yyyy',' dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
  $scope.format = $scope.formats[0];
  // end date picker

  // time picker
   $scope.mytime = new Date();

  $scope.hstep = 1;
  $scope.mstep = 15;

  $scope.options = {
    hstep: [1, 2, 3],
    mstep: [1, 5, 10, 15, 25, 30]
  };

  $scope.ismeridian = true;
  $scope.toggleMode = function() {
    $scope.ismeridian = ! $scope.ismeridian;
  };

  $scope.update = function() {
    var d = new Date();
    d.setHours( 14 );
    d.setMinutes( 0 );
    $scope.mytime = d;
  };

  $scope.changed = function () {
  	var h = $scope.mytime.getHours();
  	var m = $scope.mytime.getMinutes();
  	$scope.appointment_time = h +":" + m;
    console.log('Time changed to: ' + $scope.appointment_time);
  };

  $scope.clear = function() {
    $scope.mytime = null;
  };

  // end time pickerapp


	$scope.item = {};

	$scope.item.user_id = $("#user_id").val();
	$scope.item.provider_name = "";
	$scope.item.provider_phone = "";
	$scope.item.provider_address = "";
	$scope.item.provider_specialty = "";
	$scope.item.patient_name = "";
	$scope.item.appointment_date = $scope.appointment_date;
	$scope.item.appointment_time = $scope.appointment_time;
	$scope.item.reason = "";
	$scope.item.notes = "";
	$scope.err_msg = "Please select appointment date first";

  // 切记表单元素的id和name都要自定义名称,
  // 不要使用关键词,比如'submit',否则jquery提交可能无效
  $scope.submitItem = function(event, item) 
  {
    if(event){
			item.user_id = $("#user_id").val();
      event.stopPropagation();
      event.preventDefault();
      if($scope.checkInput()){

				item.appointment_date = $("#appointment_date").val();
				item.appointment_time = $scope.appointment_time;
        // console.log(item);
        Appointment.save(item);

				$scope.item = {}; // clear data
  			$scope.init(); //临时：刷新页面，效率比较低 但是删除有问题。暂时用
        $('#addItem').modal('hide');

				return false;
      } 

	  	// console.log("false", $scope.item);
	  	return false;
    }
  }

  $scope.checkInput = function() 
  {
  	console.log("check");
  	if($scope.appointment_date == null) {
			$scope.err_msg = "Please select appointment date.";
		} else if($scope.appointment_time == null) {
			$scope.err_msg = "Please select appointment time";
		} else if($scope.item.patient_name == "") {
			$scope.err_msg = "Please enter patient name";
		} else {
			$scope.err_msg = "";
			return true;
		}
		
		return false;
  }

}]);

// myhealth conditions ---------------------------------------------------------------------//
myCtrls.controller('MyConditionCtrl', ['$scope', '$http', 'Appontment', function ($scope, $http, Appontment) 
{

}]);


// myhealth family ---------------------------------------------------------------------//
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
  $scope.submitMember = function(event,f) 
  {
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

  $scope.checkInput = function() 
  {
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

// myhealth insurance ---------------------------------------------------------------------//
myCtrls.controller('MyInsuranceCtrl', ['$scope', '$http', 'Appontment', function ($scope, $http, Appontment) 
{

}]);
