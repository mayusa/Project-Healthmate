<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyConditionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('my_conditions', function(Blueprint $table)
		{
			$table->increments('id');
      $table->Integer('conditionid');
      $table->string('date');
      $table->string('doctor');
      $table->string('note');
			$table->timestamps();
      // 1 - active , 0 - blocked
      $table->tinyInteger('status')->default(1);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('my_conditions');
	}

}
