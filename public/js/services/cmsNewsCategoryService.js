'use strict';
 
// cmsNewsService.js
/* Services */
angular.module('newsCagetoryService', [])
  .factory('NewsCategory', function($resource) {   
      return $resource('/cms/newscategory', {}, {}) ; 
  });

  