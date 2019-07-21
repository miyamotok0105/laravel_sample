<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();

        for ($i = 0; $i < 50; $i++) {
            $author = [
                'name' => '著者名'.$i,
                'kana' => 'チョシャメイ'.$i,
                'created_at' => $now,
                'updated_at' => $now
            ];
            DB::table('authors')->insert($author);
        }
    }
}
