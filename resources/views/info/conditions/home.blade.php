@extends('app')

@section('content')

<div ng-controller="InfoConditionCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">

              <div class="row">
              
                <div class="col-sm-8 col-xs-12">
            <h5><strong>Conditions List</strong></h5>
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
                  <a href="" ng-click="sortField=sortField=='is_common'?'-is_common':'is_common'">is common</a>
                </th>
              </tr>
              <!--ngrepeat-->
              <tr ng-repeat="condition in conditionsall | filter:search | orderBy:sortField" ng-class="{ active:condition.is_common == 1 }">
                <td><% condition.id %></td>
                <td><a href="/info/conditions/<% condition.id %>/view"><% condition.title %></a></td>
                <td class="hidden-xs">
                <span ng-if="condition.is_common==1">Yes</span>
                <span ng-if="condition.is_common==0">No</span>
                </td>
              </tr>
              <!--/ ngrepeat-->
              </table>

            </div><!--/ panel-body-->
        </div>

      <div class="text-right">
        <!-- bootstrap ui pagination -->
        <pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" max-size="maxSize" boundary-links="true" previous-text="‹" next-text="›" first-text="«" last-text="»"></pagination>
      </div>

    </div>

</div>
@endsection