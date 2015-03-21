@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
                    @if (Session::has('errmsg'))
                        Your account are blocked ~!
                    @elseif (Auth::guest())
                        Welcome to HealthMate~~~
                    @else
                        Dear <b class="text-danger">{{ Auth::user()->name }}</b>, you are logged in!
                    @endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
