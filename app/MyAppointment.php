<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MyAppointment extends Model {

	protected $table = 'my_appointments';
	protected $fillable = [
	'userid', 
	'provider_name', 
	'provider_phone', 
	'provider_address', 
	'provider_specialty', 
	'patient_name', 
	'appointment_date',
	'reason',
	'notes'
	];


}
