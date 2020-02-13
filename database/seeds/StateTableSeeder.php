<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class StateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('state')->insert([
        'id_country' => 1,
        'id_zone' => 1,
        'name' => 'Barcelona'
      ]);
      DB::table('state')->insert([
        'id_country' => 2,
        'id_zone' => 2,
        'name' => 'Andorra la Vella'
      ]);
    }
}
