'use strict';
 
// adminUsersService.js
/* Services */
angular.module('userService', [])
  .factory('User', function($resource) {   
      return $resource('/admin/users/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });

  