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

{{-- 
          <div class="page-header">

            <div class="pull-right form-inline">
              <div class="btn-group">
                <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                <button class="btn btn-default" data-calendar-nav="today">Today</button>
                <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
              </div>
              <div class="btn-group">
                <button class="btn btn-warning" data-calendar-view="year">Year</button>
                <button class="btn btn-warning active" data-calendar-view="month">Month</button>
                <button class="btn btn-warning" data-calendar-view="week">Week</button>
                <button class="btn btn-warning" data-calendar-view="day">Day</button>
              </div>
            </div>

            <h3></h3>
          </div>

          <div class="row">
            <div class="col-md-9">
              <div id="calendar"></div>
            </div>
            <div class="col-md-3">
              <h4>Events</h4>
              <small>This list is populated with events dynamically</small>
              <ul id="eventlist" class="nav nav-list"></ul>
            </div>
          </div>

          <div class="clearfix"></div>
          <br><br>

          <div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h3 class="modal-title">Event</h3>
                </div>
                <div class="modal-body" style="height: 400px">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
 --}}
    </div>

</div>
@endsection