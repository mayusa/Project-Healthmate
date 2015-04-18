'use strict';

var app = angular.module('hmApp', [
	'cmsCtrls',
	'cmsServs'
	]);

app.config(function($interpolateProvider) 
{
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});