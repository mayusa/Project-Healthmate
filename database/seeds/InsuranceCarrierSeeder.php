<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\InsuranceCarrier;

class InsuranceCarrierSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('insurance_carriers')->truncate();


        $file = 'database/seeds/insurenceCarriers.txt';
        $content = file_get_contents($file);    
        $array = explode("\n", $content);
     
        for($i=0; $i<count($array); $i++)
        {
            InsuranceCarrier::create(['carrier_name' => $array[$i]]);
        }
        
    
    }

}


/*  */