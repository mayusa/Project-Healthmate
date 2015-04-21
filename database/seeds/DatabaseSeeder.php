<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call('AdminUserSeeder');
		$this->call('RoleTableSeeder');

		//category data
		$this->call('NewsCategoryTableSeeder');
		$this->call('FacilityCategorySeeder');
		$this->call('SpecialityTableSeeder');
		$this->call('InsuranceCarrierSeeder');

		// faker data:
		$this->call('FakerNewsSeeder');
		$this->call('FakerDoctorsSeeder');
		$this->call('FakerFacilitiesSeeder');
		$this->call('FakerConditionsSeeder');
	}

}
