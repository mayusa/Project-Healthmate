@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
          <h5><strong>Home</strong></h5>
        </div>

				<div class="panel-body">
					<div>
		        @if (Session::has('errmsg'))
		            Your account are blocked ~!
		        @elseif (Auth::guest())
		            Welcome to HealthMate~~~
		        @else
		            Dear <b class="text-danger">{{ Auth::user()->name }}</b>, Welcome to HealthMate~~~!
		        @endif
	        </div>
	        <hr>


                <div>
                    <h3>How it works</h3> <hr>
                   - Get Answers to Medical Questions Check symptoms, learn about conditions and understand your health – all in real-life language so you can take action 
every day. <hr>
 
- Find & Connect with Care Options Quickly and easily find and connect with care options that are right for you (e.g., doctors, facilities, ER, Urgent Care).  <hr>
 
- Securely Manage Your Health Information Conveniently manage your own health information – whenever, wherever – so you can live with health at hand.  


                </div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
