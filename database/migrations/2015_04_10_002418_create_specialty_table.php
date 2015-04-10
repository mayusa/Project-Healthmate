<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialtyTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('specialty', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('speci_name');
			$table->tinyInteger('root_speci_id')->default(0);// 0->1st level id->2ed level total 2 levels
      $table->tinyInteger('is_common')->default(0);//1-yes, 0-false
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
		Schema::drop('specialty');
	}

}
