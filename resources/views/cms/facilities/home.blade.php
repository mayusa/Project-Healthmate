@extends('cms.default')

@section('content')

<div ng-controller="CmsFacilityCtrl">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">

          <div class="col-sm-8 col-xs-12">
            <h5><strong>CMS Facilities List</strong> <a href="/cms/facilities/create" class="btn btn-info btn-xs"> add facility </a> </h5>
          </div>

          <div class="col-sm-4 col-xs-12">
            <label for="searchinput" class="sr-only">Search</label>
             <input ng-model="search.$" class="form-control" id="searchinput" placeholder="search">
          </div>

        </div>           
      </div>
      <div class="panel-body">

        <!-- response msg -->
        @if (Session::has('msg'))
        <div class="alert alert-success text-center">{{ Session::get('msg') }}</div>
        @endif

        <table class="table table-condensed">
          <tr>
            <th>facility id</th>
            <th><a href="" ng-click="sortField=sortField=='facility_name'?'-facility_name':'facility_name'">name</a></th>
            <th class="hidden-xs">
              <a href="" ng-click="sortField=sortField=='category_name'?'-category_name':'category_name'">category</a>
            </th>
            <th class="hidden-xs">modify</th>
          </tr>
          <!--ngrepeat-->
          <tr ng-repeat="facility in facilitiesall | filter:search | orderBy:sortField">
            <td><% facility.id %></td>
            <td><a href="/cms/facilities/<% facility.id %>/view"><% facility.facility_name %></a> </td>
            <td class="hidden-xs">
              <span ng-repeat="category in facilitycatesall"> 
                <span ng-if="facility.facicateid === category.id "><% facility.facicateid %> - <span ng-bind="facility.category_name = category.faci_cate_name"></span></span>
              </span>
            </td>
            <td class="hidden-xs">
              <a href="/cms/facilities/<%facility.id%>/edit" class="btn btn-info btn-xs">EDIT</a>
            </td>
          </tr>
          <!--/ ngrepeat-->
          </table>
        </div>
      </div>
    </div>

  </div>
  @endsection