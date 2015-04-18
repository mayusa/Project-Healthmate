<div class="container">

	<ul class="nav nav-tabs">
	  <li @if( strpos(Request::url(), '/myhealth/family') ) class="active" @endif >
	  	<a href="/myhealth/family/home">My Family</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/insurances') ) class="active" @endif >
	  	<a href="/myhealth/insurances/home">My Insurance</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/appointments') ) class="active" @endif >
	  	<a href="/myhealth/appointments/home">My Appointments</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/conditions') ) class="active" @endif >
	  	<a href="/myhealth/conditions/home">My Conditions</a>
	  </li>
	</ul>
</div>