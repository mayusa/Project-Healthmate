@extends('cms.default')

@section('content')

<div ng-controller="CmsConditionCreateCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>CMS Create Condition </strong></h5>
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
          <form id="condition_form" action="/cms/conditions" method="POST" name="frm" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <!-- field 1:userid -->
            <input type="hidden" name="userid" value="{{Auth::id()}}">

              <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                  <div id="err" class="text-danger"><% err_msg %></div> 
                </div>
              </div>

            <!-- field 3: condition title -->
            <h5>
              <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                  <input type="text" class="form-control" name="title" id="title" placeholder="Condition Title" ng-model="condition.title" ng-change="checkInput()" required="required">
              </div><!-- /.col-lg-6 -->

            </div>
            </h5>

            <!-- field 2: condition is_common -->
            <h5>
              <div class="row">
              <div class="col-lg-8 col-lg-offset-2">

                <label class="radio-inline">
                  <strong>is common: </strong>
                </label>

                <label class="radio-inline">
                  <input type="radio" name="is_common" ng-model="condition.is_common" id="inlineRadio1" value="0" checked="checked">No
                </label>
                <label class="radio-inline">
                  <input type="radio" name="is_common" ng-model="condition.is_common" id="inlineRadio2" value="1">Yes
                </label>

              </div><!-- /.col-lg-6 -->

            </div>
            </h5>

          <!-- field 4: condition content -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <label for="description">Content</label>
                <textarea name="content" class="form-control" id="content" rows="5" placeholder="condition content" ng-model="condition.content"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>


          <!-- field 5: condition fromurl -->
            <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">

              <div class="input-group">
                <label for="fromurl" class="input-group-addon" id="basic-addon2"><strong>From</strong> http://</label>
                  <input type="text" class="form-control" name="fromurl" id="fromurl" placeholder="condition Source (URL)" ng-model="condition.fromurl">
              </div>
              </div><!-- /.col-lg-6 -->
            </div>
            </h5>

          <!-- field 7: condition description -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <label for="description">Description</label>
                <textarea name="description" class="form-control" id="description" rows="5" placeholder="condition description" ng-model="condition.description"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- field 8: condition symptoms -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <label for="symptoms">Symptoms</label>
                <textarea name="symptoms" class="form-control" id="symptoms" rows="5" placeholder="condition symptoms" ng-model="condition.symptoms"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>


          <!-- field 9: condition tests -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <label for="tests">Tests</label>
                <textarea name="tests" class="form-control" id="tests" rows="5" placeholder="condition tests" ng-model="condition.tests"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>

          <!-- field 10: condition treatment -->
          <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <label for="treatment">Treatment</label>
                <textarea name="treatment" class="form-control" id="treatment" rows="5" placeholder="condition treatment" ng-model="condition.treatment"></textarea>
              </div><!-- /.col-lg-6 -->
            </div>
          </h5>


          <!-- field 11: condition img url -->
            <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
              <div class="input-group">
                <label for="img_url" class="input-group-addon" id="basic-addon3"><strong>image</strong> http://</label>
                  <input type="text" class="form-control" name="img_url" id="img_url" placeholder="condition image (URL)" ng-model="condition.img_url">
                  </div>
              </div><!-- /.col-lg-6 -->
            </div>
            </h5>

          <!-- field 11: condition video url -->
            <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">

              <div class="input-group">
                <label for="video_url" class="input-group-addon" id="basic-addon4"><strong>video</strong> http://</label>
                  <input type="text" class="form-control" name="video_url" id="video_url" placeholder="condition video (URL)" ng-model="condition.video_url">
                </div>

              </div><!-- /.col-lg-6 -->
            </div>
            </h5>


          <div class="text-center">
            <button class="btn btn-lg btn-info col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4" ng-click="submitCondition( $event )">Submit</button>
          </div>

          </form>
          <!-- / end form -->

            </div>
        </div>
    </div>

</div>

@endsection