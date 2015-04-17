<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\News;

class FakerNewsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('news')->truncate();
      // Create a Faker object
      // https://github.com/fzaninotto/Faker
      $faker = Faker\Factory::create();

        // Create 10 news
      for ($i=0; $i < 60; $i++) 
      {
        News::create([  
          'userid' => 1,  
          'cateid' => $faker->randomDigitNotNull($max = 7),  
          'title' => $faker->sentence($nbWords = 6),  
          'content' => $faker->text($maxNbChars = 20000),  
          'fromurl' => $faker->url  
        ]); 

      }

    }

  }
