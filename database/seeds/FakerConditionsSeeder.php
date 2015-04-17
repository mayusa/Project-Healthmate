<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Condition;

class FakerConditionsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('condition')->truncate();
      // Create a Faker object
      // https://github.com/fzaninotto/Faker
      $faker = Faker\Factory::create();

        // Create 10 news
      for ($i=0; $i < 60; $i++) 
      {
        Condition::create([  
          'userid' => 1,
          'is_common' => 0, 
          'title' => $faker->sentence($nbWords = 6), 
          'content' => $faker->text($maxNbChars = 20000), 
          'fromurl' => $faker->url, 
          'description' => $faker->text($maxNbChars = 1000), 
          'symptoms' => $faker->text($maxNbChars = 1000), 
          'tests' => $faker->text($maxNbChars = 1000), 
          'treatment' => $faker->text($maxNbChars = 1000), 
          'img_url' => $faker->url, 
          'video_url' => $faker->url, 
          'status' => 1
        ]); 

      }

    }

  }
