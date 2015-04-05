'use strict';
 
// cmsConditionsService.js
/* Services */
angular.module('conditionsService', [])
  .factory('Doctors', function($resource) {   
      return $resource('/cms/conditions/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });

  