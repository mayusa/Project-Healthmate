'use strict';
 
// cms News Service -----------------------------------//
var myServs = angular.module('myServs',[]);

myServs.factory('Appontment', function($resource) {   
      return $resource('/myhealth/appontments/:id/', {id: '@id'}, {}) ; 
  });

myServs.factory('Family', function($resource) {   
      return $resource('/myhealth/family/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });

// // myhealth Facilities Service -----------------------------//
// myServs.factory('Facilites', function($resource) {   
//       return $resource('/myhealth/facilities/:id/', {id: '@id'}, {}) ; 
//   });
// myServs.factory('FacilitesCategory', function($resource) {
//         return $resource('/myhealth/facilitiescategory/:id/', {id: '@id'}, {}) ;
//     });

// // myhealth Doctors Service -----------------------------//
// myServs.factory('Doctors', function($resource) {   
//       return $resource('/myhealth/doctors/:id/', {id: '@id'}, {}) ; 
//   });
// myServs.factory('Specialties', function($resource) {
//         return $resource('/myhealth/specialties/:id/', {id: '@id'}, {}) ;
//     });

// // myhealth Conditions Service -----------------------------//
// myServs.factory('Conditions', function($resource) {   
//       return $resource('/myhealth/conditions/:id/', {id: '@id'}, {}) ; 
//   });