<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AuthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach(range(1,5) as $item){
            User::create([
                'role' => '3',
                'name' => $faker->name,
                'email' => 'User' .$item. '@example.test',
                'username' => $faker->name,
                'password' => Hash::make('password'),
            ]);
        }
    }
}
