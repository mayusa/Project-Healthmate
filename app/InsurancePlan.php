<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InsurancePlan extends Model {

	protected $table = 'insurance_plans';
	protected $fillable = [
	'carrier_id', 
	'plan_name'
	];


}
