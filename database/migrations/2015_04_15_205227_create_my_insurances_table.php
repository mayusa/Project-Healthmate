<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyInsurancesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('my_insurances', function(Blueprint $table)
		{
			$table->increments('id');
			$table->Integer('userid');//fk
      $table->Integer('carrier_id');//fk
      $table->Integer('plan_id');//fk
      $table->string('member_id');
      $table->string('group_number');
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
		Schema::drop('my_insurances');
	}

}
