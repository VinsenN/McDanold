<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryList = [
            'Chicken',
            'Burger',
            'Snack',
            'Rice Bowl',
            'Drink',
        ];

        foreach ($categoryList as $cat) {
            DB::table('categories')->insert([
                'name' => $cat
            ]);
        }
    }
}
