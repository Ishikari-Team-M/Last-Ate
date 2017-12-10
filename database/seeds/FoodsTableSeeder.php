<?php

use Illuminate\Database\Seeder;
use App\Food;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Food::create([
            'name' => 'ラーメン'
        ]);

        Food::create([
            'name' => '牛丼'
        ]);

        Food::create([
            'name' => 'うどん'
        ]);
    }
}
