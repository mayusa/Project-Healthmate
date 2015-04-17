<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFamiliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_families', function(Blueprint $table)
		{
			$table->increments('id');
			$table->Integer('userid');//user id
      $table->string('first_name');
      $table->string('last_name');
      $table->tinyInteger('gender');
      $table->string('birth');
      $table->string('phone');
      $table->string('email');
      $table->Integer('zip_code');
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
		Schema::drop('user_families');
	}

}
