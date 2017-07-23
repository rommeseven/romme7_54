<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //$this->call(LaratrustSeeder::class);
        
       $faker = Faker::create();

           foreach (range(1,6) as $index) {

            DB::table('pages')->insert([

                'title' => $faker->name,

                'parent_id' => 0

            ]);

        }

        foreach (range(1,50) as $index) {

            DB::table('pages')->insert([

                'title' => $faker->name,

                'parent_id' => $faker->numberBetween(1,20)

            ]);

        }


            }
}
