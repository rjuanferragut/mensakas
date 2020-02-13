<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;
class ZonesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('zones')->insert([
        'name' => "Baix Llobregat",
        'zipcode' => 8940,
      ]);
      DB::table('zones')->insert([
        'name' => "Andorra la Vella",
        'zipcode' => 500,
      ]);
    }
}
