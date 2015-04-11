@extends('cms.default')

@section('content')

<div ng-controller="CmsDoctorEditCtrl">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-sm-8 col-xs-12">
            <h5><strong>CMS Edit Doctor </strong></h5>
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
        <form id="doctor_form" action="/cms/doctors" method="POST" name="frm" novalidate>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <!-- field 1:doctorid -->
          <input type="hidden" name="id" value="{{ $doctor->id }}" id="doctorid">
          <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
              <!--warning message-->
              <div id="err" class="text-danger"><% err_msg %></div> 
            </div>
          </div>

          <!-- doctor name ** -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="input-group">
                <!-- field 3:doctor_name *** -->
                  <input type="text" class="form-control" name="doctor_name" id="doctor_name" placeholder="doctor name" ng-model="doctor.doctor_name" ng-change="checkInput()" required="required">

                  <!-- doctor specialty -->
                  <div class="input-group-btn">

                    <!-- field 2:facicatedid -->
                    <input type="hidden" name="speciid" value="<% doctor.speciid %>">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                      <% selected_speci %> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li ng-repeat="specialty in specialtiesall" id="menu<%$index%>">
                        <a href="#" ng-click="changeSpecialty(specialty.speci_name, specialty.id)">
                         <% specialty.speci_name %>
                        </a>
                      </li>
                    </ul>

                  </div><!-- /btn-group -->
                  <!-- / doctor specialty -->
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->

            </div>
          </h5>

          <!-- doctor intro ** -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 4:intro -->
                <textarea name="intro" class="form-control" id="intro" rows="5" placeholder="doctor introduction" ng-model="doctor.intro"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- doctor address -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 5:address -->
                <input type="text" class="form-control" aria-label="..." name="address" id="address" placeholder="doctor address" ng-model="doctor.address">
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- doctor GPS -->
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 8:latitude, field 9:longitude -->
                <h5>
                  <input type="text" class="form-control" aria-label="..." name="latitude" id="latitude" placeholder="GPS latitude" ng-model="doctor.latitude">          
                  </h5>
                  <input type="text" class="form-control" aria-label="..." name="longitude" id="longitude" placeholder="GPS longitude" ng-model="doctor.longitude">
                </div>
              </div><!-- /.col-lg-6 -->


          <!-- doctor overview -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <!-- field 10:overview -->
                <textarea name="overview" class="form-control" id="overview" rows="5" placeholder="doctor overview" ng-model="doctor.overview"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>



          <!-- doctor background -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <textarea name="background" class="form-control" id="background" rows="5" placeholder="doctor background" ng-model="doctor.background"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>


          <!-- doctor appointments -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <textarea name="appointments" class="form-control" id="appointments" rows="5" placeholder="doctor appointments" ng-model="doctor.appointments"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- doctor pic url -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <div class="input-group">
                <!-- field 11:web_url -->
                <label for="pic_url" class="input-group-addon" id="basic-addon2"><strong>pic</strong> http://</label>
                <input type="text" class="form-control"  aria-describedby="basic-addon2" name="pic_url" id="pic_url" placeholder="doctor pic url" ng-model="doctor.pic_url">
              </div><!-- /.col-lg-6 -->
            </div>
            </div>
          </h5>


          <div class="text-center">
            <button class="btn btn-lg btn-info col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4" ng-click="updateDoctor( $event, doctor )">Submit</button>
          </div>

        </form>
        <!-- / end form -->

      </div>
    </div>
  </div>

</div>

@endsection