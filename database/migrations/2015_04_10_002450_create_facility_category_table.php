<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('facility_category', function(Blueprint $table)
		{
			/* faci_cate_name
			1 emergency department
			2 hospital
			3 urgent care
			4 retail clinic
			5 pharmacy
			6 outpatient clinic
			7 home health care
			8 community health centers
			*/
			$table->increments('id');
      $table->string('faci_cate_name');
			$table->Integer('root_faci_cate_id')->default(0);//0->1st level, id->2ed level, total 2 levels
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
		Schema::drop('facility_category');
	}

}
