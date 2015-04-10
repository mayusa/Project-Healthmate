/* Controllers */
'use strict';
var cmsCtrls = angular.module('cmsCtrls', ['cmsServs','ngResource']);


cmsCtrls.controller('CmsCtrl', ['$scope', function ($scope) 
{
  //console.log('i am cms home page');
}]);

// --- NEWS CONTROLLERS -----------------------------------------------------------//

// /cms/news/home
cmsCtrls.controller('CmsNewsCtrl', ['$scope', 'News', 'NewsCategory', function ($scope, News, NewsCategory) 
{
  $scope.sortField = "created_at";
  $scope.newsall = News.query();
  $scope.newcatesall = NewsCategory.query();

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
    $scope.err_msg = "";
  };

  $scope.updateNews = function(event, n) {

    $scope.news.content = ueedit.getContent();
    
    if(event){
      event.stopPropagation();
      event.preventDefault();
      if(checkInput()){
        //console.log("true", $scope.news);
        News.update({id: n.id}, n);
        window.location.href="/cms/news/home";
        return false;
      }
      return false;
    }
  }

  var checkInput = function() {
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

	$scope.selected_cate = "Category";
	$scope.news = {};
	$scope.news.cateid = 0;
	$scope.news.title = ""
	$scope.news.content = ""
	$scope.news.from = ""
	$scope.err_msg = "Please select a category first";

  $scope.changeCate = function(cate, id) {
  	$scope.selected_cate = cate;
  	$scope.news.cateid = id;
		$scope.err_msg = "";

  };

  // 切记表单元素的id和name都要自定义名称,
  // 不要使用关键词,比如'submit',否则jquery提交可能无效
  $scope.submitNews = function(event) {
    
    $scope.news.content = uecreate.getContent();

    if(event){
      event.stopPropagation();
      event.preventDefault();
      if(checkInput()){
	  		console.log("true", $scope.news);
				$("#news_form").submit();
				return false;
      } 

	  	console.log("false", $scope.news);
	  	return false;
    }
  }

  var checkInput = function() {
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


// --- FACILITY CONTROLLERS -----------------------------------------------------------//
cmsCtrls.controller('CmsFacilityCtrl', ['$scope', 'Facilites', 'FacilitesCategory', function ($scope, News, NewsCategory) {

}]);


// --- DOCTOR CONTROLLERS -----------------------------------------------------------//
cmsCtrls.controller('CmsDoctorCtrl', ['$scope', 'News', 'NewsCategory', function ($scope, News, NewsCategory) {

}]);


// --- CONDITION CONTROLLERS -----------------------------------------------------------//
cmsCtrls.controller('CmsConditionCtrl', ['$scope', 'News', 'NewsCategory', function ($scope, News, NewsCategory) {

}]);




