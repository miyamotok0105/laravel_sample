<?php

use Illuminate\Database\Seeder;

class PublishersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        $faker = \Faker\Factory::create('Ja_JP');

        for ($i = 0; $i < 50; $i++) {
            $pulisher = [
                'name' => $faker->company.'出版',
                'address' => $faker->address,
                'created_at' => $now,
                'updated_at' => $now
            ];
            DB::table('publishers')->insert($pulisher);
        }
    }
}
