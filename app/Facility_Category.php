<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility_Category extends Model {

	//
	protected $table = 'facility_category';//must declare before seed
    // need declare input of all fields
	protected $fillable = ['faci_cate_name', 'root_faci_cate_id'];

}
