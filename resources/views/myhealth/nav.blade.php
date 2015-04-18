<div class="container mynav">

	<ul class="nav nav-tabs">
	  <li @if( strpos(Request::url(), '/myhealth/family') ) class="active" @endif >
	  	<a href="/myhealth/family/home">
	  	<h4><span class="fa fa-users"></span>
	  	<span class="hidden-xs"> <small> My Family </small></span>
	  	</h4>
	  	</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/insurances') ) class="active" @endif >
	  	<a href="/myhealth/insurances/home">
	  	<h4><span class="fa fa-life-ring"></span><span class="hidden-xs"> <small> My Insurance</small></span></h4>
	  	
	  	</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/appointments') ) class="active" @endif >
	  	<a href="/myhealth/appointments/home">
	  	<h4><span class="fa fa-calendar"></span> <span class="hidden-xs"><small> My Appointments </small></span></h4>
	  	</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/conditions') ) class="active" @endif >
	  	<a href="/myhealth/conditions/home">
	  	<h4><span class="fa fa-heartbeat"></span> <span class="hidden-xs"><small> My Conditions </small></span></h4>
	  	
	  	</a>
	  </li>
	</ul>
</div>