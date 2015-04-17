<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Doctor;

class FakerDoctorsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('doctor')->truncate();
      // Create a Faker object
      // https://github.com/fzaninotto/Faker
      $faker = Faker\Factory::create();

        // Create 10 news
      for ($i=0; $i < 226; $i++) 
      {
        Doctor::create([  
          'userid' => 1,
          'speciid' => rand(1,174), 
          'doctor_name' => $faker->name, 
          'intro' => $faker->text($maxNbChars = 1000), 
          'address' => $faker->address, 
          'latitude' => $faker->latitude, 
          'longitude' => $faker->longitude, 
          'overview' => $faker->text($maxNbChars = 1000), 
          'patient_ratings' => $faker->randomDigitNotNull, 
          'background' => $faker->text($maxNbChars = 600), 
          'appointments' => $faker->text($maxNbChars = 600), 
          'pic_url' => $faker->url
        ]); 

      }

    }

  }
