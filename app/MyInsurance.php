<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MyInsurance extends Model {

	protected $table = 'my_insurances';
	protected $fillable = [
	'userid', 
	'carrier_id', 
	'plan_id', 
	'member_id', 
	'group_number'
	];

}
