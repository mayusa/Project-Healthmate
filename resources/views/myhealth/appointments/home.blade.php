@extends('app')

@include('myhealth.nav')

@section('content')
<link rel="stylesheet" href="/lib/bootstrap-calendar/css/calendar.css">

<style type="text/css">
  .btn-twitter {
    padding-left: 30px;
    background: rgba(0, 0, 0, 0) url(https://platform.twitter.com/widgets/images/btn.27237bab4db188ca749164efd38861b0.png) -20px 9px no-repeat;
  }
  .btn-twitter:hover {
    background-position:  -21px -16px;
  }
</style>

<div ng-controller="MyAppointmentCtrl">
    <div class="myhealthcontainer">
        <div class="panel panel-default">
            <div class="panel-body">

              <!-- response msg -->
              @if (Session::has('msg'))
                 <div class="alert alert-success text-center">{{ Session::get('msg') }}</div>
              @endif

              <div class="row">
              
                <div class="col-sm-8 col-xs-12">
                  <h5><strong></strong></h5>
                </div>

                <div class="col-sm-4 col-xs-12 text-right">
                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addItem">Add Appointment</button>
                </div>

              </div>

              <h5>
                <div class="col-sm-4" ng-repeat="appointment in appointmentsall | orderBy:sortField">
                  <div class="thumbnail text-center">
                  <span class="glyphicon glyphicon-remove text-left" ng-click="deletePop(appointment, $index)"></span>

                    <h2><%appointment.appointment_date%></h2>
                    <h3>Patient name: <%appointment.patient_name%></h3>
                    <span ng-if="appointment.reason">Reason: <%appointment.reason%><br></span>
                    <span ng-if="appointment.notes">Note: <%appointment.notes%> <br></span>
                    <hr>
                    <span ng-if="appointment.provider_name">provider name: <%appointment.provider_name%><br></span>
                    <span ng-if="appointment.provider_phone">provider phone: <%appointment.provider_phone%><br></span>
                    <span ng-if="appointment.provider_address">provider address: <%appointment.provider_address%><br></span>
                   <span ng-if="appointment.provider_specialty">provider specialty: <%appointment.provider_specialty%><br></span>
                  </div>
                </div>
              </h5>


    </div> <!--/ panel body-->

</div> <!--/ panel-->
</div> <!--/ myhealthcontainer-->


  <!-- modal: add user popup -->
  <div class="modal fade in" id="addItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title text-center">Add a new Appointment</h3>
        </div>

        <div class="modal-body text-center" ng-controller="AppointmentCreateCtrl">

              <div class="text-danger"><%err_msg%></div>
          <!-- start form -->
          <form id="appointment_form" name="frm" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- field 1:userid -->
            <input type="hidden" name="user_id" value="{{Auth::id()}}" id="user_id">

            <!-- member name -->
              <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                {{-- date time --}}
                <div class="row">
                  <div class="col-xs-7">
                    <div class="input-group appointment_date">
                      <span class="input-group-addon">Date </span>
                      <input type="text" class="form-control" name="appointment_date" id="appointment_date" datepicker-popup="<%format%>" ng-model="appointment_date" is-open="opened" min-date="minDate" max-date="'2019-06-22'" datepicker-options="dateOptions" date-disabled="disabled(date, mode)" ng-required="true" close-text="Close" ng-change="checkInput()" />
                      <span class="input-group-addon" ng-click="open($event)"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                  </div>
                  <div class="col-xs-5">
                 <timepicker ng-model="mytime" ng-change="changed()" hour-step="hstep" minute-step="mstep" show-meridian="ismeridian"></timepicker>
                 </div>
                </div>
                {{-- time --}}

                <div>
                  <h3>Provider Information</h3><hr>
                </div>
                {{-- provider name --}}

                  <h5>
                  <div class="input-group">
                    <label for="provider_name" class="input-group-addon" id="basic-addon2"><strong>Provider Name</strong></label>
                      <input type="text" class="form-control" name="provider_name" id="provider_name" ng-model="item.provider_name" required>
                  </div>
                  </h5>

                {{-- provider phone --}}
                  <div class="input-group">
                    <label for="provider_phone" class="input-group-addon" id="basic-addon2"><strong>Provider Phone</strong></label>
                      <input type="text" class="form-control" name="provider_phone" id="provider_phone" ng-model="item.provider_phone">
                  </div>

                {{-- provider address --}}
                  <h5>
                  <div class="input-group">
                    <label for="provider_address" class="input-group-addon" id="basic-addon2"><strong>Provider Address</strong></label>
                      <input type="text" class="form-control" name="provider_address" id="provider_address" ng-model="item.provider_address">
                  </div>
                  </h5>

                {{-- provider specialty --}}
                <div class="input-group">
                    <label for="provider_specialty" class="input-group-addon" id="basic-addon2"><strong>Provider Specialty</strong></label>
                    <input type="text" class="form-control" name="provider_specialty" id="provider_specialty" ng-model="item.provider_specialty">
                </div>
                <div>
                  <h3>Patient Information</h3><hr>
                </div>
                {{-- patient name --}}
                <h5>
                <div class="input-group">
                  <span class="input-group-addon">patient name</span>
                  <input type="text" name="patient_name" class="form-control" ng-model="item.patient_name" ng-change="checkInput()" required>
                  <div class="input-group-btn">
                  <input type="hidden" name="cateid" value="<% news.cateid %>">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Family member <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li><a href="#" ng-click='item.patient_name="{{Auth::user()->name}}"'> {{Auth::user()->name}}</a></li>
                      <li ng-repeat="member in familysall"><a href="#" ng-click='item.patient_name=member.first_name'><%member.first_name%></a></li>
                    </ul>
                  </div><!-- /btn-group -->


                </div>

                </h5>

                {{-- reason --}}
                <h5>
                <div class="input-group">
                  <span class="input-group-addon">Reason </span>
                  <input type="text" name="reason" class="form-control" ng-model="item.reason">
                </div>
                </h5>

                {{-- notes --}}
                <h5>
                <div class="input-group">
                  <span class="input-group-addon">Notes </span>
                  <input type="text" name="notes" class="form-control" ng-model="item.notes">
                </div>
                </h5>



                </div><!-- /.col-lg-8 -->
              </div><!-- /row -->

            <h5>
            <div class="text-center">
              <button class="btn btn-lg btn-info col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4" ng-click="submitItem( $event,item )">Submit</button>
            </div>
            </h5>

          </form>
          <!-- / end form -->

        </div>
        <div class="modal-footer">
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  <!-- /modal: add user popup -->

  <!-- modal: delete confirm popup -->
    <div class="modal fade in bs-example-modal-sm" id="confirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title text-center">Are you sure delete " <%del_item.appointment_date%> "?</h4>
          </div>
          <div class="modal-body text-center">

            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary btn-block" ng-click="deleteItem(del_item, index)">Yes</button>
          </div>
          <div class="modal-footer">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- /modal -->



</div>
@endsection