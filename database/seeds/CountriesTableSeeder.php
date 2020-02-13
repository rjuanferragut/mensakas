<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class CountriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('country')->insert([
        'id_zone' => 1,
        'id_lang' => 1,
        'iso_code' => 'esp'
      ]);
      DB::table('country')->insert([
        'id_zone' => 2,
        'id_lang' => 1,
        'iso_code' => 'and'
      ]);
    }
}
