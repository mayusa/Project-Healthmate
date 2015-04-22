<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyAppointmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('my_appointments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->Integer('user_id');//fk
      $table->string('provider_name');
      $table->string('provider_phone');
      $table->string('provider_address');
      $table->string('provider_specialty');
      $table->string('patient_name');
      $table->string('appointment_date');
      $table->string('reason');
      $table->string('notes');
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
		Schema::drop('my_appointments');
	}

}
