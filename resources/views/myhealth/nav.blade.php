<div class="container">
	<ul class="nav nav-tabs">
	  <li @if( strpos(Request::url(), '/myhealth/home') ) class="active" @endif>
	  	<a href="#">My Health Home</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/family') ) class="active" @endif >
	  	<a href="#">My Family</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/insurances') ) class="active" @endif >
	  	<a href="#">My Insurance</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/appointments') ) class="active" @endif >
	  	<a href="#">My Appointments</a>
	  </li>
	  <li @if( strpos(Request::url(), '/myhealth/conditions') ) class="active" @endif >
	  	<a href="#">My Conditions</a>
	  </li>
	</ul>
</div>