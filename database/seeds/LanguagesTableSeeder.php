<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('language')->insert([
        'name' => 'esp',
        'default' => 1,
      ]);
      DB::table('language')->insert([
        'name' => 'eng',
        'default' => 0,
      ]);
    }
}
