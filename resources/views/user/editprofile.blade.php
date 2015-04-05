@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
      <div class="panel panel-default">
        <div class="panel-heading">Modify profile</div>

        <div class="panel-body">

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

          <form action="{{ URL('user/'.$user->id.'/edit') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <h5>
              <div class="input-group">
                <span class="input-group-addon">Nick Name </span>
                <input type="text" name="name" class="form-control" required="required" value="{{ $user->name }}">
              </div>
            </h5>

            @if((Auth::user()->rid == 2  || Auth::user()->rid == 3) && $user->rid != 3 )
            <div class="row">

              <div class="col-xs-4">
                <div class="input-group">
                  <span class="input-group-addon">

                    @if($user->rid==1)
                    <input type="radio" aria-label="..." name="rid" value="1" checked="checked">
                    @else
                    <input type="radio" aria-label="..." name="rid" value="1">
                    @endif
                  </span>

                  <input type="text" class="form-control" aria-label="..." name="" value="user">
                </div><!-- /input-group -->
              </div><!-- /.col-xs-4 -->

              <div class="col-xs-4">
                <div class="input-group">
                  <span class="input-group-addon">

                    @if($user->rid==2)
                    <input type="radio" aria-label="..." name="rid" value="2" checked="checked">
                    @else
                    <input type="radio" aria-label="..." name="rid" value="2">
                    @endif
                  </span>

                  <input type="text" class="form-control" aria-label="..." name="" value="admin">
                </div><!-- /input-group -->
              </div><!-- /.col-xs-4 -->

              <div class="col-xs-4">
                <div class="input-group">
                  <span class="input-group-addon">

                    @if($user->rid==4)
                    <input type="radio" aria-label="..." name="rid" value="4" checked="checked">
                    @else
                    <input type="radio" aria-label="..." name="rid" value="4">
                    @endif
                  </span>

                  <input type="text" class="form-control" aria-label="..." name="" value="editor">
                </div><!-- /input-group -->
              </div><!-- /.col-xs-4 -->

            </div>
            @endif
            <h5>
              <div class="input-group">
                <span class="input-group-addon">First Name </span>
                <input type="text" name="first_name" class="form-control" required="required" value="{{ $user->first_name }}">
              </div>
            </h5>

            <div class="input-group">
              <span class="input-group-addon">Last Name </span>
              <input type="text" name="last_name" class="form-control" required="required" value="{{ $user->last_name }}">
            </div>

            <h5>
              <div class="row">
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon">

                      @if($user->gender==1)
                      <input type="radio" aria-label="..." name="gender" value="1" checked="checked">
                      @else
                      <input type="radio" aria-label="..." name="gender" value="1">
                      @endif
                    </span>

                    <input type="text" class="form-control" aria-label="..." name="" value="male">
                  </div><!-- /input-group -->
                </div><!-- /.col-xs-6 -->
                <div class="col-xs-6">
                  <div class="input-group">
                    <span class="input-group-addon">
                      @if($user->gender==0)
                      <input type="radio" aria-label="..." name="gender" value="0" checked="checked">
                      @else
                      <input type="radio" aria-label="..." name="gender" value="0">
                      @endif
                    </span>
                    <input type="text" class="form-control" aria-label="..." name="" value="female">
                  </div><!-- /input-group -->

                </div><!-- /.col-lg-6 -->
              </div><!-- /.row -->
            </h5>

            <div class="input-group">
              <span class="input-group-addon">Phone </span>
              <input type="tel" name="phone" class="form-control" value="{{ $user->phone }}">
            </div>

            <h5>
              <div class="input-group">
                <span class="input-group-addon">Address </span>
                <input type="text" name="address" class="form-control" value="{{ $user->address }}">
              </div>
            </h5>

            <div class="input-group">
              <span class="input-group-addon">Zip Code </span>
              <input type="text" name="zip_code" class="form-control" value="{{ $user->zip_code }}">
            </div>


            <h5>
              <div class="input-group">
                <span class="input-group-addon">Birth Day </span>
                <input type="string" name="birth" class="form-control" value="{{ $user->birth }}" placeholder="mm/dd/yyyy">
              </div>
            </h5>


            <br>
            <br>
            <button class="btn btn-lg btn-info btn-block">Submit</button>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection