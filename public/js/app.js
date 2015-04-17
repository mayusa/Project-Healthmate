'use strict';

var app = angular.module('hmApp', [
	'ui.bootstrap',
	'cmsCtrls',
	'cmsServs'
	]);

app.config(function($interpolateProvider) 
{
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});