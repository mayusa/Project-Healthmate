@extends('admin.default')

@section('content')

<div ng-controller="AdminUsersCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-xs-6">
                   Users
                </div>
                <div class="col-xs-6 text-right">
                    Search <input ng-model="search.$">
                </div>  
              </div>           
            </div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th class="hidden-xs"><a href="" ng-click="sortField=sortField=='email'?'-email':'email'">email</a></th>
                        <th><a href="" ng-click="sortField=sortField=='name'?'-name':'name'">nick name</a></th>
                        <th><a href="" ng-click="sortField=sortField=='rid'?'-rid':'rid'">role</a></th>
                        <th><a href="" ng-click="sortField=sortField=='status'?'-status':'status'">status</a></th>
                        <th>modify</th>
                    </tr>
                    <tr ng-repeat="user in users | filter:search | orderBy:sortField">
                        <td><% user.id %></td>
                        <td class="text-success hidden-xs"><% user.email %></td>
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
                        	<button ng-if=" user.status == 0 " ng-click="changeStatus(user.id, $index)" class="btn btn-danger btn-xs">BLOCK</button>
                        	<button ng-if=" user.status == 1 " ng-click="changeStatus(user.id, $index)" class="btn btn-success btn-xs">UNBLOCK</button>
                          </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection