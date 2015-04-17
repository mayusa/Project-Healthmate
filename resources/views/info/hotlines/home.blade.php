@extends('app')

@section('content')

<div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">

              <div class="row">
              
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>hotlines</strong></h5>
                </div>

              </div> 

            </div>
            <div class="panel-body">
              
            <!-- response msg -->
            @if (Session::has('msg'))
            <div class="alert alert-success text-center">{{ Session::get('msg') }}</div>
            @endif

            <h1>hotlines</h1>

            </div><!--/ panel-body-->
        </div>
    </div>

</div>
@endsection