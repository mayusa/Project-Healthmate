@extends('cms.default')

@section('content')

<div ng-controller="CmsDoctorCtrl">

  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">

          <div class="col-sm-8 col-xs-12">
            <h5><strong>CMS Facilities List</strong> <a href="/cms/doctors/create" class="btn btn-info btn-xs"> add doctor </a> </h5>
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
            <th>doctor id</th>
            <th><a href="" ng-click="sortField=sortField=='doctor_name'?'-doctor_name':'doctor_name'">doctor name</a></th>
            <th class="hidden-xs">
              <a href="" ng-click="sortField=sortField=='speci_name'?'-speci_name':'speci_name'">specialty</a>
            </th>
            <th class="hidden-xs">modify</th>
          </tr>
          <!--ngrepeat-->
          <tr ng-repeat="doctor in doctorsall | filter:search | orderBy:sortField">
            <td><% doctor.id %></td>
            <td><a href="/cms/doctors/<% doctor.id %>/view"><% doctor.doctor_name %></a> </td>
            <td class="hidden-xs">
              <span ng-repeat="specialty in specialtiesall"> 
                <span ng-if="doctor.speciid === specialty.id "><% specialty.speci_name %></span></span>
              </span>
            </td>
            <td class="hidden-xs">
              <a href="/cms/doctors/<%doctor.id%>/edit" class="btn btn-info btn-xs">EDIT</a>
            </td>
          </tr>
          <!--/ ngrepeat-->
          </table>
          
        </div> <!--/ panel-body-->
      </div>
    </div>

</div>
@endsection