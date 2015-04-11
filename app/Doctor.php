<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model {

	//
	protected $table = 'doctor';//must declare before seed
    // need declare input of all fields
	protected $fillable = [
	'userid', 
	'speciid', 
	'doctor_name', 
	'intro', 
	'address', 
	'latitude', 
	'longitude', 
	'overview', 
	'patient_ratings', 
	'background', 
	'appointments', 
	'pic_url', 
	'status'
	];

}
