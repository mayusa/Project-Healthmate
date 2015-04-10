@extends('cms.default')

@section('content')

<div ng-controller="CmsFacilityCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>CMS Facilities List</strong></h5>
                </div>

              </div>           
            </div>
            <div class="panel-body">
              <%welcome%>
              
              <!-- response msg -->
              @if (Session::has('msg'))
                 <div class="alert alert-success text-center">{{ Session::get('msg') }}</div>
              @endif

              <table class="table table-condensed">
                <tr>
                    <th>news id</th>
                    <th><a href="" ng-click="sortField=sortField=='title'?'-title':'title'">title</a></th>
                    <th class="hidden-xs"><a href="" ng-click="sortField=sortField=='category_name'?'-category_name':'category_name'">category</a></th>
                    <th class="hidden-xs"><a href="" ng-click="sortField=sortField=='status'?'-status':'status'">status</a></th>
                    <th class="hidden-xs">modify</th>
                </tr>
                <tr ng-repeat="news in newsall | filter:search | orderBy:sortField" ng-class="{ active:news.status == 0 }">
                    <td><% news.id %></td>
                    <td><a href="/cms/news/<% news.id %>/view"><% news.title %></a> </td>
                    <td class="hidden-xs">

                      <span ng-repeat="category in newcatesall"> 
                        <span ng-if="news.cateid === category.id "><% news.cateid %> - <span ng-bind="news.category_name = category.category_name"></span></span>
                      </span>

                    </td>
                    <td class="hidden-xs">
                        <span ng-if=" news.status == 1 ">active</span>
                        <span ng-if=" news.status == 0 " class="text-danger">blocked</span>
                    <td class="hidden-xs">
                      <a href="/cms/news/<%news.id%>/edit" class="btn btn-info btn-xs">EDIT</a>
                      <button ng-if=" news.status == 1 " class="btn btn-danger btn-xs" ng-click="delePop(news)" >BLOCK</button>
                      <button ng-if=" news.status == 0 " class="btn btn-success btn-xs" ng-click="delePop(news)" >UNBLOCK</button>

                    </td>
                </tr>
            </table>
            </div>
        </div>
    </div>

</div>
@endsection