<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {

	//
	protected $table = 'news';
    // need declare input of all fields
	protected $fillable = ['userid', 'cateid', 'title', 'content', 'fromurl'];

}
