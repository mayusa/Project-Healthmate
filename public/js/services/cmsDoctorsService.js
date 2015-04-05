'use strict';
 
// cmsDoctorsService.js
/* Services */
angular.module('doctorsService', [])
  .factory('Doctors', function($resource) {   
      return $resource('/cms/doctors/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });

  