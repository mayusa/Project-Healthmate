<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConditionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('condition', function(Blueprint $table)
		{
			$table->increments('id');//condition id
      $table->Integer('userid');//user id
      $table->tinyInteger('is_common')->default(0);//1-yes, 0-false
      $table->string('title');
      $table->text('content');
      $table->timestamps();
      $table->string('fromurl'); // url string
      $table->tinyInteger('status')->default(1);//1-active, 0-blocked
      $table->text('description');
      $table->text('symptoms');
      $table->text('tests');
      $table->text('treatment');
      $table->string('img_url'); // url string
      $table->string('video_url'); // url string

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('condition');
	}

}
