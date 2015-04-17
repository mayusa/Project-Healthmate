<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceCarrier extends Model {

	protected $table = 'insurance_carriers';
	protected $fillable = [
	'carrier_name'
	];

}
