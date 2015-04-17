<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Facility;

class FakerFacilitiesSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('facility')->truncate();
      // Create a Faker object
      // https://github.com/fzaninotto/Faker
      $faker = Faker\Factory::create();

        // Create 10 news
      for ($i=0; $i < 60; $i++) 
      {
        Facility::create([  
          'userid' => 1,
          'facicateid' => $faker->randomDigitNotNull,
          'facility_name'=> $faker->text($maxNbChars = 50), 
          'intro' => $faker->text($maxNbChars = 1000), 
          'address' => $faker->address, 
          'web_url' => $faker->url, 
          'tel' => $faker->phoneNumber, 
          'latitude' => $faker->latitude, 
          'longitude' => $faker->longitude, 
          'overview' => $faker->text($maxNbChars = 1000), 
          'pic_url' => $faker->url, 
          'facebook_url' => $faker->url, 
          'youtube_url' => $faker->url, 
          'twitter_url' => $faker->url, 
          'google_url' => $faker->url
        ]); 

      }

    }

  }
