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
      for ($i=0; $i < 66; $i++) 
      {
        News::create([  
          'user_id' => 1,  
          'cateid' => rand(1,7),  
          'title' => $faker->sentence($nbWords = 6),  
          'content' => $faker->text($maxNbChars = 6000),  
          'fromurl' => $faker->url  
        ]); 

      }
    }

  }
