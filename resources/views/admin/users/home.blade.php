@extends('admin.default')

@section('content')

<div ng-controller="AdminUsersCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Users list</div>
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <th>id</th>
                        <th>email</th>
                        <th>nick name</th>
                        <th>role</th>
                        <th>status</th>
                        <th>modify</th>
                    </tr>
                    <tr ng-repeat="user in users">
                        <td><% user.id %></td>
                        <td><% user.email %></td>
                        <td><a href="/user/<% user.id %>/profile"><% user.name %></a> <a href="/user/<% user.id %>/edit" ng-if="{{Auth::user()->rid}} == 3"><span class="glyphicon glyphicon-edit"></span></a></td>
                        <td>
													<span ng-if=" user.rid == 1 ">user</span>								
													<span ng-if=" user.rid == 2 ">admin</span>
													<span ng-if=" user.rid == 3 ">god</span>
													<span ng-if=" user.rid == 4 ">editor</span>
                        </td>
                        <td>
													<span ng-if=" user.status == 0 ">active</span>								
													<span ng-if=" user.status == 1 ">blocked</span>
                        <td>
                          <span ng-if=" user.id != {{Auth::id()}} && user.rid != 3">
                        	<button ng-if=" user.status == 0 " ng-click="changeStatus(user.id, $index)" class="btn btn-danger">BLOCK</button>
                        	<button ng-if=" user.status == 1 " ng-click="changeStatus(user.id, $index)" class="btn btn-success">UNBLOCK</button>
                          </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


@endsection