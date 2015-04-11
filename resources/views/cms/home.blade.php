@extends('cms.default')

@section('content')

<div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>CMS Home</strong></h5>
                </div>

              </div>           
            </div>
            <div class="panel-body">
              Dear <b class="text-danger">{{ Auth::user()->name }}</b> (Editor), Welcome to HealthMate Content Management System~~~!
            </div>
        </div>
    </div>

</div>
@endsection