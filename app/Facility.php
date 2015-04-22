<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model {

	//
	protected $table = 'facility';//must declare before seed
    // need declare input of all fields
	protected $fillable = [
	'user_id', 
	'facicateid', 
	'facility_name', 
	'intro', 
	'address', 
	'web_url', 
	'tel', 
	'latitude', 
	'longitude', 
	'overview', 
	'pic_url', 
	'facebook_url', 
	'youtube_url', 
	'twitter_url', 
	'google_url'
	];

}
