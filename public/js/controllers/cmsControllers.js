/* Controllers */
'use strict';
var cmsCtrls = angular.module('cmsCtrls', [
  'cmsServs',
  'ngResource', 
  'ui.bootstrap', 
  'ui.bootstrap.tpls'
  ]);


cmsCtrls.controller('CmsCtrl', ['$scope', function ($scope) 
{
  //console.log('i am cms home page');
}]);

// --- NEWS CONTROLLERS (need ueditor)-------------------------------------------------//

// /cms/news/home
cmsCtrls.controller('CmsNewsCtrl', ['$scope', '$http', 'News', 'NewsCategory', function ($scope, $http, News, NewsCategory) 
{
  // $scope.newsall = News.query(); //using angular $resource
  $scope.newcatesall = NewsCategory.query();
  // pagination
  $scope.newsall = [];
  $scope.lastpage=1;

  $scope.init = function() {
      $http({
          url: '/cms/news/angular',
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
      });
  };

  $scope.init();
  // end pagination

  $scope.sortField = "created_at";

  $scope.delePop = function (news)
  {
    $('#confirmBlock').modal('show');
    //console.log($scope.blockid );
    $scope.blockid = news.id;
    $scope.blockobj= news;
  };

  $scope.changeStatus = function (id, n)//need object n(news) !!!
  {
  	//console.log("id", id);
  	var news = News.get({id: id}, function(news)
    {
      if(news.status == 0){
  			n.status = 1;
      }
  		else{
  			n.status = 0
      }
  		News.update({id: id}, n);
  	});
    // close modal
    $('#confirmBlock').modal('hide');
  }

}]);

// /cms/news/{id}/view
cmsCtrls.controller('CmsNewsViewCtrl', ['$scope', 'News', function ($scope, News) 
{
  //data comes from laravel 
  var htmlcontent = $(".text-justify").text();
  // transfor text to html
  $(".text-justify").html(htmlcontent);

}]);

// /cms/news/{id}/edit
cmsCtrls.controller('CmsNewsEditCtrl', ['$scope', 'News', 'NewsCategory', function ($scope, News, NewsCategory) 
{
  $scope.newcatesall = NewsCategory.query();

  var newsid = $("#newsid").val();
  $scope.news={};
  $scope.news.cateid = 0;
  $scope.news.title = ""
  $scope.news.content = ""
  $scope.news.from = ""

  $scope.selected_cate = "";
  $scope.err_msg = "";

  News.get({id: newsid}, function(news)
  {
    $scope.news = news;
    $scope.news.cateid = news.cateid;
    // get news cateid from db(restful)
    NewsCategory.get({id: news.cateid}, function(category){
      $scope.selected_cate = category.category_name;
      $scope.err_msg = "";
    });

  });

  $scope.changeCate = function(cate, id) {
    $scope.selected_cate = cate;
    $scope.news.cateid = id;
    $scope.checkInput();
  };

  $scope.updateNews = function(event, n) {
    $scope.news.content = ueedit.getContent();
    
    if(event){
      event.stopPropagation();
      event.preventDefault();
      if($scope.checkInput()){
        //console.log("true", $scope.news);
        News.update({id: n.id}, n);
        window.location.href="/cms/news/home";
        return false;
      }
      return false;
    }
  }

  $scope.checkInput = function() {
    if($scope.news.title == "") {
      $scope.err_msg = "please enter a title";
    } else if($scope.news.cateid == 0) {
      $scope.err_msg = "please select a category";
    } else if($scope.news.content == "") {
      $scope.err_msg = "please enter content";
    } else {
      $scope.err_msg = "";
      return true;
    }
      return false;
  }

}]);

// /cms/news/create
cmsCtrls.controller('CmsNewsCreateCtrl', ['$scope', 'News', 'NewsCategory', function ($scope, News, NewsCategory) 
{

	// $scope.err_msg = "please select a category first";
  $scope.newcatesall = NewsCategory.query();

	$scope.selected_cate = "News Category";
	$scope.news = {};
	$scope.news.cateid = 0;
	$scope.news.title = ""
	$scope.news.content = ""
	$scope.news.fromurl = ""
	$scope.err_msg = "Please select a news category first";

  $scope.changeCate = function(cate, id) {
  	$scope.selected_cate = cate;
  	$scope.news.cateid = id;
		$scope.checkInput();

  };

  // 切记表单元素的id和name都要自定义名称,
  // 不要使用关键词,比如'submit',否则jquery提交可能无效
  $scope.submitNews = function(event) {
    
    $scope.news.content = uecreate.getContent();

    if(event){
      event.stopPropagation();
      event.preventDefault();
      if($scope.checkInput()){
	  		console.log("true", $scope.news);
				$("#news_form").submit();
				return false;
      } 

	  	console.log("false", $scope.news);
	  	return false;
    }
  }

  $scope.checkInput = function() {
  	if($scope.news.title == "") {
			$scope.err_msg = "Please enter a title";
		} else if($scope.news.cateid == 0) {
			$scope.err_msg = "Please select a category";
		} else if($scope.news.content == "") {
			$scope.err_msg = "Please enter content";
		} else {
			$scope.err_msg = "";
			return true;
		}
			return false;
  }

}]);


// --- FACILITY CONTROLLERS -----------------------------------------------------------//
cmsCtrls.controller('CmsFacilityCtrl', ['$scope', '$http', 'Facilites', 'FacilitesCategory', function ($scope, $http, Facilites, FacilitesCategory) 
{
  $scope.sortField = "created_at";
  // $scope.facilitiesall = Facilites.query();
  $scope.facilitycatesall = FacilitesCategory.query();
    // pagination
  $scope.facilitiesall = [];
  $scope.lastpage=1;

  $scope.init = function() {
      $http({
          url: '/cms/facilities/angular',
          method: "GET",
          params: {page:  $scope.lastpage}
      })
      .success(function(data){
          $scope.facilitiesall = data.data;
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
      });
  };

  $scope.init();
  // end pagination

}]);

// /cms/facilities/create
cmsCtrls.controller('CmsFacilityCreateCtrl', ['$scope', 'Facilites', 'FacilitesCategory', function ($scope, Facilites, FacilitesCategory) 
{
  $scope.facilitycatesall = FacilitesCategory.query();

  $scope.selected_cate = "Facility Category";
  $scope.facility = {};
  $scope.facility.facicateid = 0;
  $scope.facility.facility_name = ""
  $scope.facility.intro = ""; //textarea
  $scope.facility.address = "";
  $scope.facility.web_url = "";
  $scope.facility.tel = "";
  $scope.facility.latitude = "";
  $scope.facility.longitude = "";
  $scope.facility.overview = "";//textarea
  $scope.facility.pic_url = "";
  $scope.facility.facebook_url = "";
  $scope.facility.youtube_url = "";
  $scope.facility.twitter_url = "";
  $scope.facility.google_url = "";

  $scope.err_msg = "Please select a facility category first";

  $scope.changeCate = function(cate, id) {
    $scope.selected_cate = cate;
    $scope.facility.facicateid = id;
    $scope.checkInput();
  };

  $scope.submitFacility = function(event) {

    if(event){
      event.stopPropagation();
      event.preventDefault();
      if($scope.checkInput()){
        console.log("true", $scope.facility);
        $("#facility_form").submit();
        return false;
      } 
      console.log("false", $scope.facility);
      return false;
    }
  }

  $scope.checkInput = function() {
    if($scope.facility.facility_name == "") {
      console.log("check name input");
      $scope.err_msg = "Please enter a facility name";
    } else if($scope.facility.facicateid == 0) {
      console.log("check category input");
      $scope.err_msg = "Please select a facility category";
    } else if($scope.facility.intro == "") {
      console.log("check introducton input");
      $scope.err_msg = "Please enter facility introducton";
    } else {
      $scope.err_msg = "";
      return true;
    }
    
    return false;
  }

}]);

// /cms/facilities/{id}/edit
cmsCtrls.controller('CmsFacilityEditCtrl', ['$scope', 'Facilites', 'FacilitesCategory', function ($scope, Facilites, FacilitesCategory) 
{
  $scope.facilitycatesall = FacilitesCategory.query();

  var facilityid = $("#facilityid").val();
  console.log(facilityid);
  $scope.selected_cate = "Facility Category";
  $scope.facility = {};
  $scope.facility.facicateid = 0;
  $scope.facility.facility_name = ""
  $scope.facility.intro = ""; //textarea
  $scope.facility.address = "";
  $scope.facility.web_url = "";
  $scope.facility.tel = "";
  $scope.facility.latitude = "";
  $scope.facility.longitude = "";
  $scope.facility.overview = "";//textarea

  $scope.facility.pic_url = "";
  $scope.facility.facebook_url = "";
  $scope.facility.youtube_url = "";
  $scope.facility.twitter_url = "";
  $scope.facility.google_url = "";
  $scope.err_msg = "";

  Facilites.get({id: facilityid}, function(facility)
  {
    $scope.facility = facility;
    $scope.facility.facicateid = facility.facicateid;
    // get facility facicateid from db(restful)
    FacilitesCategory.get({id: facility.facicateid}, function(category){
      $scope.selected_cate = category.faci_cate_name;
      $scope.err_msg = "";
    });

  });

  $scope.changeCate = function(cate, id) {
    $scope.selected_cate = cate;
    $scope.facility.facicateid = id;
    $scope.checkInput();
  };

  $scope.updateFacility = function(event, f) 
  {    
    if(event){
      event.stopPropagation();
      event.preventDefault();
      if( $scope.checkInput ){

        console.log("true", $scope.facility);
        Facilites.update({id: f.id}, f);
        window.location.href="/cms/facilities/home";
        return false;
      }
      return false;
    }
  }

  $scope.checkInput = function() {
    if($scope.facility.title == "") {
      $scope.err_msg = "please enter a title";
    } else if($scope.facility.facicateid == 0) {
      $scope.err_msg = "please select a category";
    } else if($scope.facility.content == "") {
      $scope.err_msg = "please enter content";
    } else {
      $scope.err_msg = "";
      return true;
    }
      return false;
  }

}]);



// --- DOCTOR CONTROLLERS -----------------------------------------------------------//
cmsCtrls.controller('CmsDoctorCtrl', ['$scope', '$http', 'Doctors', 'Specialties', function ($scope, $http, Doctors, Specialties) 
{
  $scope.sortField = "created_at";
  // $scope.doctorsall = Doctors.query();
  $scope.specialtiesall = Specialties.query();
    // pagination
  $scope.doctorsall = [];
  $scope.lastpage=1;

  $scope.init = function() {
      $http({
          url: '/cms/doctors/angular',
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
      });
  };

  $scope.init();
  // end pagination
}]);

// /cms/doctor/{id}/view
cmsCtrls.controller('CmsDoctorViewCtrl', ['$scope', 'Specialties', function ($scope, Specialties) 
{

  $scope.specialtyname = "";
  var speciid = $("#speciid").val();
  //console.log(speciid);
  Specialties.get({id: speciid}, function(specility)
  {
    $scope.specialtyname = specility.speci_name;
  });

}]);

// /cms/doctors/create
cmsCtrls.controller('CmsDoctorCreateCtrl', ['$scope', 'Doctors', 'Specialties', function ($scope, Doctors, Specialties) 
{
  $scope.specialtiesall = Specialties.query();

  $scope.selected_speci = "Doctor Specialty";
  $scope.doctor = {};
  $scope.doctor.speciid = 0;
  $scope.doctor.doctor_name = ""
  $scope.doctor.intro = ""; //textarea
  $scope.doctor.address = "";
  $scope.doctor.latitude = "";
  $scope.doctor.longitude = "";
  $scope.doctor.overview = "";//textarea
  // $scope.doctor.patient_ratings = 0;
  $scope.doctor.background = "";
  $scope.doctor.appointments = "";
  $scope.doctor.pic_url = "";

  $scope.err_msg = "Please select a doctor specilty first";

  $scope.changeSpecialty = function(speci, id) {
    $scope.selected_speci = speci;
    $scope.doctor.speciid = id;
    $scope.checkInput($scope.doctor.speciid);
  };

  $scope.submitDoctor = function(event) {

    if(event){
      event.stopPropagation();
      event.preventDefault();
      if($scope.checkInput()){
        //console.log("true", $scope.doctor);
        $("#doctor_form").submit();
        return false;
      } 
      //console.log("false", $scope.doctor);
      return false;
    }
  }

  $scope.checkInput = function() {
    if($scope.doctor.doctor_name == "") {
      $scope.err_msg = "Please enter a doctor name";
    } else if($scope.doctor.speciid == 0) {
      $scope.err_msg = "Please select a doctor specialty";
    } else {
      $scope.err_msg = "";
      return true;
    }
    
    return false;
  }

}]);


// /cms/doctors/{id}/edit
cmsCtrls.controller('CmsDoctorEditCtrl', ['$scope', 'Doctors', 'Specialties', function ($scope, Doctors, Specialties) 
{
  $scope.specialtiesall = Specialties.query();

  var doctorid = $("#doctorid").val();

  $scope.selected_cate = "Doctor Specialty";
  $scope.doctor = {};
  $scope.doctor.speciid = 0;
  $scope.selected_speci = "";
  $scope.doctor.doctor_name = "";
  $scope.doctor.intro = ""; //textarea
  $scope.doctor.address = "";
  $scope.doctor.latitude = "";
  $scope.doctor.longitude = "";
  $scope.doctor.overview = "";//textarea
  $scope.doctor.background = "";
  $scope.doctor.appointments = "";
  $scope.doctor.pic_url = "";

  $scope.err_msg = "";

  Doctors.get({id: doctorid}, function(doctor)
  {
    $scope.doctor = doctor;
    $scope.doctor.speciid = doctor.speciid;
    // get doctor speciid from db(restful)
    Specialties.get({id: doctor.speciid}, function(specialty){
      $scope.selected_speci = specialty.speci_name;
      $scope.err_msg = "";
    });

  });

  $scope.changeSpecialty = function(speci_name, id) {
    $scope.selected_speci = speci_name;
    $scope.doctor.speciid = id;
    $scope.checkInput();
  };

  $scope.updateDoctor = function(event, d) 
  {    
    if(event){
      event.stopPropagation();
      event.preventDefault();
      if( $scope.checkInput ){

        //console.log("true", $scope.doctor);
        Doctors.update({id: d.id}, d);
        window.location.href="/cms/doctors/home";
        return false;
      }
      return false;
    }
  }

  $scope.checkInput = function() {
    if($scope.doctor.title == "") {
      $scope.err_msg = "please enter a title";
    } else if($scope.doctor.speciid == 0) {
      $scope.err_msg = "please select a category";
    } else if($scope.doctor.content == "") {
      $scope.err_msg = "please enter content";
    } else {
      $scope.err_msg = "";
      return true;
    }
      return false;
  }

}]);

// --- CONDITION CONTROLLERS -----------------------------------------------------------//
cmsCtrls.controller('CmsConditionCtrl', ['$scope', '$http', 'Conditions', function ($scope, $http, Conditions) 
{

  $scope.sortField = "created_at";
  // $scope.conditionsall = Conditions.query();
  // pagination
  $scope.conditionsall = [];
  $scope.lastpage=1;

  $scope.init = function() {
      $http({
          url: '/cms/conditions/angular',
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
      });
  };

  $scope.init();
  // end pagination

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
      //console.log(c);
      Conditions.update({id: id}, c);
    });
  }
}]);


// /cms/conditions/create
cmsCtrls.controller('CmsConditionCreateCtrl', ['$scope', 'Conditions', function ($scope, Conditions) 
{

  $scope.condition = {};
  $scope.condition.is_common = 0;
  $scope.condition.title = ""
  $scope.condition.content = ""; //textarea
  $scope.condition.fromurl = "";
  $scope.condition.description = "";
  $scope.condition.symptoms = "";
  $scope.condition.tests = "";
  $scope.condition.treatment = "";
  $scope.condition.img_url = "";//textarea
  $scope.condition.video_url = "";
  $scope.condition.status = 1;

  $scope.err_msg = "";

  $scope.submitCondition = function(event) {
    if(event){
      event.stopPropagation();
      event.preventDefault();
      if($scope.checkInput()){
        // console.log("true", $scope.condition);
        $("#condition_form").submit();
        return false;
      } 
      // console.log("false", $scope.condition);
      return false;
    }
  }

  $scope.checkInput = function() {
    if($scope.condition.title == "") {
      $scope.err_msg = "Please enter a condition title";
    } else if($scope.condition.content == "") {
      $scope.err_msg = "Please enter condition content";
    } else {
      $scope.err_msg = "";
      return true;
    }
    
    return false;
  }

}]);

// /cms/conditions/{id}/edit
cmsCtrls.controller('CmsConditionEditCtrl', ['$scope', 'Conditions', function ($scope, Conditions) 
{

  var conditionid = $("#conditionid").val();
  $scope.condition = {};
  $scope.condition.is_common = 0;
  $scope.condition.title = ""
  $scope.condition.content = ""; //textarea
  $scope.condition.fromurl = "";
  $scope.condition.description = "";
  $scope.condition.symptoms = "";
  $scope.condition.tests = "";
  $scope.condition.treatment = "";
  $scope.condition.img_url = "";//textarea
  $scope.condition.video_url = "";
  $scope.condition.status = 1;

  $scope.err_msg = "";

  Conditions.get({id: conditionid}, function(condition)
  {
    $scope.condition = condition;
    $scope.condition.conditionid = condition.id;

  });
  $scope.updateCondition = function(event, c) {
    if(event){
      event.stopPropagation();
      event.preventDefault();
      if($scope.checkInput()){
        //console.log("true", $scope.condition);
        Conditions.update({id: c.id}, c);
        window.location.href="/cms/conditions/home";
        return false;
      } 
      //console.log("false", $scope.condition);
      return false;
    }
  }

  $scope.checkInput = function() {
    if($scope.condition.title == "") {
      $scope.err_msg = "Please enter a condition title";
    } else if($scope.condition.content == "") {
      $scope.err_msg = "Please enter condition content";
    } else {
      $scope.err_msg = "";
      return true;
    }
    
    return false;
  }

}]);



