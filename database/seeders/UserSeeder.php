<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "Sales",
            "email" => "sales@gmail.com",
            "password" => bcrypt("demo1234"),
            "role" => "sales"
        ]);

        User::create([
            "name" => "Manager",
            "email" => "manager@gmail.com",
            "password" => bcrypt("demo1234"),
            "role" => "manager"
        ]);
    }
}
