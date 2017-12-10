<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja_JP');

        for ($i = 1; $i < 4; $i++){
            User::create([
                'name' => $faker->name,
                'password' => 'test'.$i
            ]);
        };
    }
}
