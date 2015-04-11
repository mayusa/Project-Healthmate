@extends('cms.default')

@section('content')

<div ng-controller="CmsFacilityEditCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>Edit Facility</strong></h5>
                </div>
              </div>           
            </div>

            <div class="panel-body">

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
        <form id="facility_form" name="frm" novalidate>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <!-- field 1:facilityid -->
          <input type="hidden" name="id" value="{{ $facility->id }}" id="facilityid">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <!--warning message-->
              <div id="err" class="text-danger"><% err_msg %></div> 
            </div>
          </div>

          <!-- facility name ** -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="input-group">
                <!-- field 3:facility_name *** -->
                  <input type="text" class="form-control" name="facility_name" id="facility_name" placeholder="facility name" ng-model="facility.facility_name" ng-change="checkInput()" required="required">

                  <!-- facility category -->
                  <div class="input-group-btn">

                    <!-- field 2:facicatedid -->
                    <input type="hidden" name="facicateid" value="<% facility.facicateid %>">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><% selected_cate %> <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li ng-repeat="category in facilitycatesall"><a href="#" ng-click='changeCate(category.faci_cate_name, category.id)'><% category.faci_cate_name %></a></li>
                    </ul>
                  </div><!-- /btn-group -->
                  <!-- / facility category -->
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->

            </div>
          </h5>

          <!-- facility intro ** -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 4:intro -->
                <textarea name="intro" class="form-control" id="intro" rows="5" placeholder="facility introduction" ng-model="facility.intro" ng-change="checkInput()"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- facility address -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 5:address -->
                <input type="text" class="form-control" aria-label="..." name="address" id="address" placeholder="facility address" ng-model="facility.address" ng-change="checkInput()">
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- facility web url -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <div class="input-group">
                <!-- field 6:web_url -->
                <label for="web_url" class="input-group-addon" id="basic-addon1"><strong>web</strong> http://</label>
                <input type="text" class="form-control"  aria-describedby="basic-addon1" name="web_url" id="web_url" placeholder="facility web url" ng-model="facility.web_url">
              </div><!-- /.col-lg-6 -->
            </div>
            </div>
          </h5>

          <!-- facility tel -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 7:tel -->
                <input type="text" class="form-control" aria-label="..." name="tel" id="tel" placeholder="facility telephone" ng-model="facility.tel">
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- facility GPS -->
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 8:latitude, field 9:longitude -->
                <h5>
                  <input type="text" class="form-control" aria-label="..." name="latitude" id="latitude" placeholder="GPS latitude" ng-model="facility.latitude">          
                  </h5>
                  <input type="text" class="form-control" aria-label="..." name="longitude" id="longitude" placeholder="GPS longitude" ng-model="facility.longitude">
                </div>
              </div><!-- /.col-lg-6 -->


          <!-- facility overview -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 10:overview -->
                <textarea name="overview" class="form-control" id="overview" rows="5" placeholder="facility overview" ng-model="facility.overview"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- facility pic url -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <div class="input-group">
                <!-- field 11:web_url -->
                <label for="pic_url" class="input-group-addon" id="basic-addon2"><strong>pic</strong> http://</label>
                <input type="text" class="form-control"  aria-describedby="basic-addon2" name="pic_url" id="pic_url" placeholder="facility pic url" ng-model="facility.pic_url">
              </div><!-- /.col-lg-6 -->
            </div>
            </div>
          </h5>

          <!-- facility facebook url -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <div class="input-group">
                <!-- field 12:facebook_url -->
                <label for="facebook_url" class="input-group-addon" id="basic-addon3"><strong>facebook</strong> http://</label>
                <input type="text" class="form-control"  aria-describedby="basic-addon3" name="facebook_url" id="facebook_url" placeholder="facility facebook url" ng-model="facility.facebook_url">
              </div><!-- /.col-lg-6 -->
            </div>
            </div>
          </h5>

          <!-- facility youtube url -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <div class="input-group">
                <!-- field 13:youtube_url -->
                <label for="youtube_url" class="input-group-addon" id="basic-addon3"><strong>youtube</strong> http://</label>
                <input type="text" class="form-control"  aria-describedby="basic-addon3" name="youtube_url" id="youtube_url" placeholder="facility youtube url" ng-model="facility.youtube_url">
              </div><!-- /.col-lg-6 -->
            </div>
            </div>
          </h5>

          <!-- facility twitter url -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <div class="input-group">
                <!-- field 14:twitter_url -->
                <label for="twitter_url" class="input-group-addon" id="basic-addon3"><strong>twitter</strong> http://</label>
                <input type="text" class="form-control"  aria-describedby="basic-addon3" name="twitter_url" id="twitter_url" placeholder="facility twitter url" ng-model="facility.twitter_url">
              </div><!-- /.col-lg-6 -->
            </div>
            </div>
          </h5>

          <!-- facility google url -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <div class="input-group">
                <!-- field 15:google_url -->
                <label for="google_url" class="input-group-addon" id="basic-addon3"><strong>google</strong> http://</label>
                <input type="text" class="form-control"  aria-describedby="basic-addon3" name="google_url" id="google_url" placeholder="facility google url" ng-model="facility.google_url">
              </div><!-- /.col-lg-6 -->
            </div>
            </div>
          </h5>



          <div class="text-center">
            <button class="btn btn-lg btn-info col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4" ng-click="updateFacility( $event, facility )">Submit</button>
          </div>

        </form>
        <!-- / end form -->


            </div>
        </div>
    </div>

</div>
@endsection