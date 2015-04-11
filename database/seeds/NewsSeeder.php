<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\News;

class NewsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('news')->truncate();

        // Create a Faker object
      $faker = Faker\Factory::create();

        // Create 10 news
      for ($i=0; $i < 10; $i++) 
      {
        News::create([  
          'userid' => 1,  
          'cateid' => $faker->randomDigitNotNull,  
          'title' => $faker->sentence($nbWords = 6),  
          'content' => $faker->paragraph($nbSentences = 6),  
          'fromurl' => $faker->url  
        ]); 

      }

    }

  }
