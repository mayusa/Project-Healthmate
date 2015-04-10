<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('doctor', function(Blueprint $table)
		{
			$table->increments('id');
			$table->Integer('userid');//user id
      $table->tinyInteger('doctor_name')->default(1);//1-yes, 0-false
      $table->text('intro');
      $table->string('address');
      $table->string('latitude');
      $table->string('longitude');
      $table->text('overview');
      $table->tinyInteger('patient_ratings')->default(0);
      $table->string('background');
      $table->string('appointments'); //appointment intro
			$table->timestamps();
      $table->string('pic_url');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('doctor');
	}

}
