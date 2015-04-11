<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Condition extends Model {

	//
	protected $table = 'condition';//must declare before seed
    // need declare input of all fields
	protected $fillable = [
	'userid',
	'is_common', 
	'title', 
	'content', 
	'fromurl', 
	'description', 
	'symptoms', 
	'tests', 
	'treatment', 
	'img_url', 
	'video_url', 
	'status'
	];

}
