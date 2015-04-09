'use strict';
 
// cmsNewsService.js
/* Services */
angular.module('newsService', [])
  .factory('News', function($resource) {   
      return $resource('/cms/news/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });

angular.module('newsCagetoryService', [])
  .factory('NewsCategory', function($resource) {   
      return $resource('/cms/newscategory/:id/', {id: '@id'}, {
        'update': {method: 'PUT'}
      }) ; 
  });

  