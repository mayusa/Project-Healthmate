'use strict';

var app = angular.module('hmApp', [
	'infoCtrls',
	'infoServs',
	'myCtrls',
	'myServs'
	]);

app.config(function($interpolateProvider) 
{
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});