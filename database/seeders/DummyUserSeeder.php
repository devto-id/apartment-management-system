<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generateNo = 100000;

        for ($i = 1; $i <= $generateNo; $i++) {
            $faker = \Faker\Factory::create();


            \App\Models\User::create([
                "name" => $faker->name,
                "email" => $faker->email,
                "password" => bcrypt("demo1234"),
                "role" => ["sales", "manager"][rand(0, 1)]
            ]);
        }
    }
}
