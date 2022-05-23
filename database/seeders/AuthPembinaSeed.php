<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AuthPembinaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        foreach(range(1,3) as $item){
            User::create([
                'role' => '2',
                'name' => $faker->name,
                'email' => 'Pembina' .$item. '@example.test',
                'username' => $faker->name,
                'password' => Hash::make('password'),
            ]);
    }
}
}