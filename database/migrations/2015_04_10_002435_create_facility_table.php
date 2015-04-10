<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facility', function(Blueprint $table)
		{
			$table->increments('id');// facility id
      $table->Integer('userid');// user id
      $table->Integer('facicateid');// facility_category id
      $table->string('facility_name');
      $table->text('intro');
      $table->string('address');
      $table->string('latitude');
      $table->string('longitude');
      $table->string('web_url');
      $table->string('tel');
      $table->text('overview');
      $table->timestamps();
      $table->string('pic_url'); // array string
      $table->string('facebook_url'); // array string
      $table->string('youtube_url'); // array string
      $table->string('twitter_url'); // array string
      $table->string('google_url'); // array string
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facility');
	}

}
