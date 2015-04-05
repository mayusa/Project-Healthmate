<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
      $table->string('email')->unique();
      $table->string('password', 60);
      $table->string('name');
      $table->string('first_name');
      $table->string('last_name');
      $table->tinyInteger('gender');
      $table->string('phone');
      $table->string('address');
      $table->Integer('zip_code');
      $table->string('birth');
      $table->integer('rid')->default(1);
      // 0 - active , 1 - blocked
      $table->tinyInteger('status')->default(0);
      $table->rememberToken();
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
		Schema::drop('users');
	}

}
