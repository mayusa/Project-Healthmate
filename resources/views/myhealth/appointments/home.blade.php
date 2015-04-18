@extends('app')

@include('myhealth.nav')

@section('content')

<div ng-controller="MyAppointmentCtrl">
    <div class="myhealthcontainer">
        <div class="panel panel-default">
            <div class="panel-body">

              <!-- response msg -->
              @if (Session::has('msg'))
                 <div class="alert alert-success text-center">{{ Session::get('msg') }}</div>
              @endif

            calender plugin

        </div>
    </div>
    

    <div class="text-right">
      <!-- bootstrap ui pagination -->
      <pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()" max-size="maxSize" boundary-links="true" previous-text="‹" next-text="›" first-text="«" last-text="»">
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