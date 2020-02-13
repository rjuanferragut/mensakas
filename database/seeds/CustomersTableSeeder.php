<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();
      foreach (range(1,10) as $index) {
        DB::table('customers')->insert([
          'id_lang' => rand(1,2),
          'id_address'=>rand(1,2),
          'first_name' => $faker->name,
          'last_name' => $faker->name,
          'email' => $faker->email,
          'phone' => rand(600000000,999999999),
        ]);
      }
    }
}
