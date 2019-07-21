<?php

//追加
use App\Article;

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
//        Article::truncate();
//
//        $now = \Carbon\Carbon::now();
//        $faker = \Faker\Factory::create();
//
//        // And now, let's create a few articles in our database:
//        for ($i = 0; $i < 50; $i++) {
//            Article::create([
//                'id' => $faker->words,
//                'user_id' => $faker->words,
//                'content' => $faker->sentence,
//                'title' => $faker->sentence,
//                'created_at' => $now,
//            ]);
//        }
    }
}
