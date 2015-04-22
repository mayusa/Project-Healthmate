<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class MyConditions extends Model {

	protected $table = 'my_conditions';
	protected $fillable = [
	'user_id', 
	'conditionid', 
	'date', 
	'doctor', 
	'notes',
	'status'
	];
}
