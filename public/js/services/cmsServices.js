'use strict';
 
// cms News Service -----------------------------------//
var cmsServs = angular.module('cmsServs',[]);

cmsServs.factory('News', function($resource) {   
      return $resource('/cms/news/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });
cmsServs.factory('NewsCategory', function($resource) {   
      return $resource('/cms/newscategory/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });


// cms Facilities Service -----------------------------//
cmsServs.factory('Facilites', function($resource) {   
      return $resource('/cms/facilities/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });
cmsServs.factory('FacilitesCategory', function($resource) {
        return $resource('/cms/facilitiescategory/:id/', {id: '@id'}, {
            'update': {method: 'PUT'}
        }) ;
    });


// cms Conditions Service -----------------------------//
cmsServs.factory('Conditions', function($resource) {   
      return $resource('/cms/conditions/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });