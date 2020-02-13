<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
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
        DB::table('users')->insert([
          'name' => $faker->name,
          'email' => $faker->email,
          'password' => bcrypt('secret'),
        ]);
      }
      DB::table('users')->insert([
        'name' => 'rafa',
        'email' => 'rjuanferragut@gmail.com',
        'password' => 'p@ssw0rd',
    }
}
