<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityMediaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facility_media', function(Blueprint $table)
		{
			$table->increments('id');
      $table->Integer('facilityid');// facility id
      $table->string('facebook_url');
      $table->string('youtube_url');
      $table->string('twitter_url');
      $table->string('google_url');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('facility_media');
	}

}
