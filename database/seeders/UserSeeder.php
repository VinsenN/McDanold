<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yilon Ma',
            'email' => 'yilonma@gmail.com',
            'password' => Hash::make(12345678),
            'gender' => 'Male',
            'date_of_birth' => '2003-04-01',
            'image_path' => null,
            'role' => 'user',
        ]);

        DB::table('users')->insert([
            'name' => 'Lao Gan Ma',
            'email' => 'laoganma@gmail.com',
            'password' => Hash::make(12345678),
            'gender' => 'Female',
            'date_of_birth' => '2002-04-01',
            'image_path' => null,
            'role' => 'admin',
        ]);
    }
}
