<?php

use Illuminate\Database\Seeder;

class MonstersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("monsters")->insert([
            "monster_id" => 1,
            "name"       => "komaさん",
            "voice"      => "もんげぇ",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);

        DB::table("monsters")->insert([
            "monster_id" => 2,
            "name"       => "Nyanchuuさん",
            "voice"      => "ミーだにゃぁ",
            "created_at" => new DateTime(),
            "updated_at" => new DateTime()
        ]);
    }
}
