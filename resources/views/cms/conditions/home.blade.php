@extends('cms.default')

@section('content')

<div ng-controller="CmsConditionCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">

              <div class="row">
              
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>CMS Conditions List</strong> <a href="/cms/conditions/create" class="btn btn-info btn-xs"> add condition </a> </h5>
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
                <th>condition id</th>
                <th><a href="" ng-click="sortField=sortField=='title'?'-title':'title'">title</a></th>
                <th class="hidden-xs">
                  <a href="">is common</a>
                </th>
                <th class="hidden-xs">modify</th>
              </tr>
              <!--ngrepeat-->
              <tr ng-repeat="condition in conditionsall | filter:search | orderBy:sortField">
                <td><% condition.id %></td>
                <td><a href="/cms/conditions/<% condition.id %>/view"><% condition.title %></a></td>
                <td class="hidden-xs">
                <span ng-if="condition.is_common==1">Yes</span>
                <span ng-if="condition.is_common==0">No</span>
                </td>
                <td class="hidden-xs">
                  <button ng-if=" condition.is_common==1 " class="btn btn-danger btn-xs" ng-click="changeStatus(condition)" >uncommon</button>
                  <button ng-if=" condition.is_common==0 " class="btn btn-success btn-xs" ng-click="changeStatus(condition)" >common</button>
                  <a href="/cms/conditions/<%condition.id%>/edit" class="btn btn-info btn-xs">EDIT</a>
                </td>
              </tr>
              <!--/ ngrepeat-->
              </table>

            </div><!--/ panel-body-->
        </div>
    </div>

</div>
@endsection