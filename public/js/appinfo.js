'use strict';

var app = angular.module('hmApp', [
	'infoCtrls',
	'infoServs'
	]);

app.config(function($interpolateProvider) 
{
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});