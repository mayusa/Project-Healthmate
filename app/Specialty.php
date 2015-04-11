<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Specialty extends Model {

	//
	protected $table = 'specialty';//must declare before seed
 //    // need declare input of all fields
	protected $fillable = ['speci_name', 'root_speci_id', 'is_common'];

}
