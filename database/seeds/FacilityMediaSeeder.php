<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Facility_Media;

class FacilityMediaSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facility_media')->truncate();
        // Facility_Media::create(['faci_cate_name' => 'Substance Abuse Clinics', 'root_faci_cate_id' => 6]); // 5


    }

}
