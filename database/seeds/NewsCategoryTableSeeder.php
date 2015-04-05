<?php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\NewsCategory;

class NewsCategoryTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news_category')->truncate();

        NewsCategory::create([
            'category_name' => 'Men\'s Health'
        ]);
        NewsCategory::create([
            'category_name' => 'Women\'s Health'
        ]);
        NewsCategory::create([
            'category_name' => 'Seniors\' Health'
        ]);
        NewsCategory::create([
            'category_name' => 'Children\'s Health'
        ]);
        NewsCategory::create([
            'category_name' => 'Infant Health'
        ]);
        NewsCategory::create([
            'category_name' => 'HealthMate News'
        ]);
        NewsCategory::create([
            'category_name' => 'General Health'
        ]);

    }

}