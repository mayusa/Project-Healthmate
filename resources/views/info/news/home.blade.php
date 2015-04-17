@extends('app')

@section('content')

<div ng-controller="InfoNewsCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
              
                <div class="col-sm-8 col-xs-12">
                  <h5><strong></strong></h5>
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
                    <th><a href="" ng-click="sortField=sortField=='title'?'-title':'title'">title</a></th>
                    <th class="hidden-xs"><a href="" ng-click="sortField=sortField=='category_name'?'-category_name':'category_name'">category</a></th>
                    <th>update</th>
                </tr>
                <tr ng-repeat="news in newsall | filter:search | orderBy:sortField" ng-class="{ active:news.status == 0 }" ng-if="news.status==1">
                    <td><a href="/info/news/<% news.id %>/view"><% news.title %></a> </td>
                    <td class="hidden-xs">

                      <span ng-repeat="category in newcatesall"> 
                        <span ng-if="news.cateid === category.id "><% news.cateid %> - <span ng-bind="news.category_name = category.category_name"></span></span>
                      </span>

                    </td>
                    <td><% news.created_at %></td>
                </tr>
            </table>

        </div>
    </div>
    
    <!-- modal: delete confirm popup -->
    <div class="modal fade in bs-example-modal-sm" id="confirmBlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Are you sure <span ng-if="blockobj.status == 1" class="text-danger">block</span><span ng-if="blockobj.status == 0" class="text-success">unblock</span><br><%blockobj.title%> ?</h4>
          </div>
          <div class="modal-body text-center">

            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary btn-block" ng-click="changeStatus(blockid, blockobj)">Yes</button>
          </div>
          <div class="modal-footer">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- /modal -->

</div>
@endsection