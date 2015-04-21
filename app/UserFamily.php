<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFamily extends Model {

	protected $table = 'user_families';
	protected $fillable = [
	'user_id', 
	'first_name', 
	'last_name', 
	'gender', 
	'birth',
	'phone',
	'email',
	'zip_code',
	'status'
	];


	public function user(){
		return $this->belongsTo('App\User');
	}

}
