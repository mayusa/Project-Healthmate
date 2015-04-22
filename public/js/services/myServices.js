'use strict';
 
// cms News Service -----------------------------------//
var myServs = angular.module('myServs',[]);

myServs.factory('Family', function($resource) {   
      return $resource('/myhealth/family/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });

myServs.factory('Appointment', function($resource) {   
      return $resource('/myhealth/appointments/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });