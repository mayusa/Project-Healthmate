@extends('app')

@include('myhealth.nav')

@section('content')

<div ng-controller="MyFamilyCtrl">
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
                  <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addUser">Add member</button>
                </div>

              </div>

              <h5>
                <div class="col-sm-4" ng-repeat="family in familysall">
                  <div class="thumbnail text-center">
                  <span class="glyphicon glyphicon-remove text-left" ng-click="deletePop(family, $index)"></span>
                    <h3><%family.first_name%> <%family.last_name%></h3>
                    <h6>
                    <hr>
                    phone: <%family.phone%>
                    <hr>
                    email:  <%family.email%>
                    </h6>

                  </div>
                </div>
              </h5>

        </div>
    </div>
    
  </div>

  <!-- modal: add user popup -->
  <div class="modal fade in" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title text-center">Add a new family member</h3>
        </div>

        <div class="modal-body text-center" ng-controller="FamilyCreateCtrl">

          <!-- start form -->
          <form id="family_form" name="frm" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- field 1:userid -->
            <input type="hidden" name="user_id" value="{{Auth::id()}}" id="user_id">

            <!-- member name -->
              <div class="row">
                <div class="col-lg-8 col-lg-offset-2">

                  <h5>
                  <div class="input-group">
                    <label for="first_name" class="input-group-addon" id="basic-addon2"><strong>First Name</strong></label>
                      <input type="text" class="form-control" name="first_name" id="first_name" ng-model="member.first_name" required>
                  </div>
                  </h5>

                  <div class="input-group">
                    <label for="last_name" class="input-group-addon" id="basic-addon2"><strong>Last Name</strong></label>
                      <input type="text" class="form-control" name="last_name" id="last_name" ng-model="member.last_name" required>
                  </div>

                  <h5>
                  <div class="row">
                  <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" name="gender" value="1" ng-checked="member.gender == 1" ng-model="member.gender">
                    </span>
                    <input type="text" class="form-control" name="" value="male">
                  </div><!-- /input-group -->
                </div><!-- /.col-xs-6 -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      <input type="radio" name="gender" value="0" ng-checked="member.gender == 0" ng-model="member.gender">
                    </span>
                    <input type="text" class="form-control" name="" value="female">
                  </div><!-- /input-group -->

                </div><!-- /.col-lg-6 -->
                </div>
                </h5>

                <div class="input-group">
                  <span class="input-group-addon">Birth Day </span>
                  <input type="string" name="birth" class="form-control" placeholder="mm/dd/yyyy" ng-model="member.birth">
                </div>

                <h5>
                <div class="input-group">
                  <span class="input-group-addon">Phone </span>
                  <input type="tel" name="phone" class="form-control" ng-model="member.phone">
                </div>
                </h5>
                  <div class="input-group">
                    <span class="input-group-addon">Email </span>
                    <input type="text" name="email" class="form-control" ng-model="member.email">
                  </div>

                <h5>
                <div class="input-group">
                  <span class="input-group-addon">Zip Code </span>
                  <input type="text" name="zip_code" class="form-control" ng-model="member.zip_code">
                </div>
                </h5>


                </div><!-- /.col-lg-8 -->
              </div><!-- /row -->

            <h5>
            <div class="text-center">
              <button class="btn btn-lg btn-info col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4" ng-click="submitMember( $event,member )">Submit</button>
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
            <h4 class="modal-title text-center">Are you sure <span ng-if="blockobj.status == 1" class="text-danger">block</span><span ng-if="blockobj.status == 0" class="text-success">unblock</span><br><%blockobj.title%> ?</h4>
          </div>
          <div class="modal-body text-center">

            <button type="button" class="btn btn-default btn-block" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-primary btn-block" ng-click="deleteMember(del_member, index)">Yes</button>
          </div>
          <div class="modal-footer">
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
  <!-- /modal -->


</div> <!--end controller-->
@endsection