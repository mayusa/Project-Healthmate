<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Specialty;

class SpecialityTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialty')->truncate();


        $file = 'database/seeds/specialities.txt';
        $content = file_get_contents($file);    
        $array = explode("\n", $content);
     
        for($i=0; $i<count($array); $i++)
        {
            Specialty::create(['speci_name' => $array[$i]]);
        }
        
    
    }

}


/*  */