@extends('admin.default')

@section('content')

<div ng-controller="AdminUsersCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>Users List</strong></h5>
                </div>

                  <div class="col-sm-4 col-xs-12">
                    <label for="searchinput" class="sr-only">Search</label>
                     <input ng-model="search.$" class="form-control" id="searchinput" placeholder="search">
                  </div>

              </div>           
            </div>
            <div class="panel-body">
                <table class="table table-condensed">
                    <tr>
                        <th>id</th>
                        <th class="hidden-xs"><a href="" ng-click="sortField=sortField=='email'?'-email':'email'">email</a></th>
                        <th><a href="" ng-click="sortField=sortField=='name'?'-name':'name'">nick name</a></th>
                        <th><a href="" ng-click="sortField=sortField=='rid'?'-rid':'rid'">role</a></th>
                        <th><a href="" ng-click="sortField=sortField=='status'?'-status':'status'">status</a></th>
                        <th>modify</th>
                    </tr>
                    <tr ng-repeat="user in users | filter:search | orderBy:sortField" ng-class="{ active:user.id == {{Auth::id()}} }">
                        <td><% user.id %></td>
                        <td class="hidden-xs"><% user.email %></td>
                        <td><a href="/user/<% user.id %>/profile">
                                <strong ng-if="user.id == {{Auth::id()}}" class="text-muted"><% user.name %></strong>
                                <span ng-if="user.id != {{Auth::id()}}"><% user.name %></span>
                            </a>
                        <a href="/user/<% user.id %>/edit" ng-if="
                        ({{Auth::user()->rid}} == 2 || {{Auth::user()->rid}} == 3) && user.rid !=3  && {{Auth::user()->rid}} != user.rid  || {{Auth::id()}} == user.id ">

                            <strong ng-if="user.id == {{Auth::id()}}" class="text-muted"><span class="glyphicon glyphicon-edit"></span></strong>
                            <span ng-if="user.id != {{Auth::id()}}"><span class="glyphicon glyphicon-edit"></span></span>
                        </a></td>
                        <td>
                            <span ng-if=" user.rid == 1 ">user</span>
                            <span ng-if=" user.rid == 2 ">admin</span>
                            <span ng-if=" user.rid == 3 "><span class="glyphicon glyphicon-heart text-danger"></span></span>
                            <span ng-if=" user.rid == 4 ">editor</span>
                        </td>
                        <td>
                            <span ng-if=" user.status == 0 ">active</span>
                            <span ng-if=" user.status == 1 " class="text-danger">blocked</span>
                        <td>
                          <span ng-if=" user.id != {{Auth::id()}} && user.rid != 3">
                        	<button ng-if=" user.status == 0 " class="btn btn-danger btn-xs" ng-click="delePop(user.id, user)" >BLOCK</button>
                        	<button ng-if=" user.status == 1 " class="btn btn-success btn-xs" ng-click="delePop(user.id, user)" >UNBLOCK</button>
                          </span>

                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

  <!-- modal: delete confirm popup -->
    <div class="modal fade in bs-example-modal-sm" id="confirmBlock" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Are you sure <span ng-if="blockuser.status == 0" class="text-danger">block</span><span ng-if="blockuser.status == 1"class="text-success">unblock</span><br><%blockuser.name%> ?</h4>
          </div>
          <div class="modal-body text-center">

            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary btn-block" ng-click="changeStatus(blockid, blockuser)">Yes</button>
          </div>
          <div class="modal-footer">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- /modal -->

</div>
@endsection