@extends('cms.default')

@section('content')

<div ng-controller="CmsFacilityCreateCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>CMS Create Facility </strong></h5>
                </div>
              </div>           
            </div>
            
            <div class="panel-body">
            <!-- success msg -->
            @if (Session::has('msg'))
               <div class="alert alert-success text-center">{{ Session::get('msg') }}</div>
            @endif
            <!-- error message -->
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
          <!-- start form -->
          <form id="facility_form" action="/cms/facilities" method="POST" name="frm" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="userid" value="{{Auth::id()}}">
              <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                
                <div id="err" class="text-danger"><% err_msg %></div> 
              </div>
              </div>
            <!-- facility title -->
            <h5>
              <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." name="title" id="title" placeholder="facility Title" ng-model="facility.title" ng-change="checkInput()" required="required">
                  <div class="input-group-btn">
                  <input type="hidden" name="facicateid" value="<% facility.facicateid %>">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><% selected_cate %> <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li ng-repeat="category in facilitycatesall"><a href="#" ng-click='changeCate(category.category_name, $index+1)'><% category.category_name %></a></li>
                    </ul>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->

            </div>
            </h5>

            <!--  -->
            <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <textarea name="content" id="content" rows="30" ng-model="facility.content" ng-change="checkInput()"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
            </h5>

            <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                  <input type="text" class="form-control" aria-label="..." name="fromurl" id="fromurl" placeholder="facility Source (URL)" ng-model="facility.fromurl">
              </div><!-- /.col-lg-6 -->
            </div>
            </h5>

          <div class="text-center">
            <button class="btn btn-lg btn-info col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4" ng-click="submitFacility( $event )">Submit</button>
          </div>

          </form>
          <!-- / end form -->

            </div>
        </div>
    </div>

</div>

@endsection