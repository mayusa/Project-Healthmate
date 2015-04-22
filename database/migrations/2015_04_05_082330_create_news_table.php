<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
			$table->increments('id');
			$table->Integer('user_id');//user id
			$table->Integer('cateid');//news category id
			$table->string('title');
			$table->text('content');
			$table->timestamps();
			$table->string('fromurl'); // url string
			$table->tinyInteger('status')->default(1);//1-active, 0-blocked
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('news');
	}

}
