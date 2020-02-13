<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    $this->call([
        LanguagesTableSeeder::class,
        ZonesTableSeeder::class,
        CountriesTableSeeder::class,
        StateTableSeeder::class,
        UsersTableSeeder::class,
        CustomersTableSeeder::class,
    ]);
  }
}
