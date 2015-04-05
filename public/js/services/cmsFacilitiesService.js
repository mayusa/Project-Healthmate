'use strict';
 
// cmsFacilitiesService.js
/* Services */
angular.module('facilitiesService', [])
  .factory('Facilites', function($resource) {   
      return $resource('/cms/facilities/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });

  