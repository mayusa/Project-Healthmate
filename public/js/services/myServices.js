'use strict';
 
// cms News Service -----------------------------------//
var infoServs = angular.module('infoServs',[]);

infoServs.factory('News', function($resource) {   
      return $resource('/info/news/:id/', {id: '@id'}, {}) ; 
  });
infoServs.factory('NewsCategory', function($resource) {   
      return $resource('/info/newscategory/:id/', {id: '@id'}, {}) ; 
  });

// info Facilities Service -----------------------------//
infoServs.factory('Facilites', function($resource) {   
      return $resource('/info/facilities/:id/', {id: '@id'}, {}) ; 
  });
infoServs.factory('FacilitesCategory', function($resource) {
        return $resource('/info/facilitiescategory/:id/', {id: '@id'}, {}) ;
    });

// info Doctors Service -----------------------------//
infoServs.factory('Doctors', function($resource) {   
      return $resource('/info/doctors/:id/', {id: '@id'}, {}) ; 
  });
infoServs.factory('Specialties', function($resource) {
        return $resource('/info/specialties/:id/', {id: '@id'}, {}) ;
    });

// info Conditions Service -----------------------------//
infoServs.factory('Conditions', function($resource) {   
      return $resource('/info/conditions/:id/', {id: '@id'}, {}) ; 
  });