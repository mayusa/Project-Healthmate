<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Facility_Category;

class FacilityCategorySeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facility_category')->truncate();
        
        Facility_Category::create(['faci_cate_name' => 'Emergency Department']); // 1
        Facility_Category::create(['faci_cate_name' => 'Hospital']); // 2
        Facility_Category::create(['faci_cate_name' => 'Urgent Care']); // 3
        Facility_Category::create(['faci_cate_name' => 'Retail Clinic']); // 4
        Facility_Category::create(['faci_cate_name' => 'Pharmacy']); // 5
        Facility_Category::create(['faci_cate_name' => 'Outpatient Clinic']); // 6 have submenu
        Facility_Category::create(['faci_cate_name' => 'Home Health Care']); // 7
        Facility_Category::create(['faci_cate_name' => 'Community Health Centers']); // 8
        // 2nd of 6

        Facility_Category::create(['faci_cate_name' => 'View All Outpatient Clinic', 'root_faci_cate_id' => 6]); // 1
        Facility_Category::create(['faci_cate_name' => 'Imaging and Xray Centers', 'root_faci_cate_id' => 6]); // 2
        Facility_Category::create(['faci_cate_name' => 'Mental Health Clinics', 'root_faci_cate_id' => 6]); // 3
        Facility_Category::create(['faci_cate_name' => 'Same Day Surgery Centers', 'root_faci_cate_id' => 6]); // 4
        Facility_Category::create(['faci_cate_name' => 'Substance Abuse Clinics', 'root_faci_cate_id' => 6]); // 5


    }

}
