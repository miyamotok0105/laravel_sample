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
        Article::truncate();
        $now = \Carbon\Carbon::now();
//        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $article = [
                'id' => $i,
                'user_id' => $i,
                'content' => 'コンテンツ'.$i,
                'title' => 'タイトル'.$i,
                'created_at' => $now
            ];
            DB::table('articles')->insert($article);
        }
    }
}
