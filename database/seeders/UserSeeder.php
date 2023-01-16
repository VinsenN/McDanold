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
            'name' => 'Vinsen Nawir',
            'email' => 'vinsennawir@gmail.com',
            'password' => Hash::make(12345678),
            'gender' => 'Male',
            'date_of_birth' => '2000-01-01',
            'image_path' => null,
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Gregorius Emmanuel Henry',
            'email' => 'gregorius.henry@gmail.com',
            'password' => Hash::make(12345678),
            'gender' => 'Male',
            'date_of_birth' => '2000-01-01',
            'image_path' => null,
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Vio Albert Ferdinand ',
            'email' => 'vio.ferdinand@gmail.com',
            'password' => Hash::make(12345678),
            'gender' => 'Male',
            'date_of_birth' => '2000-01-01',
            'image_path' => null,
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Francis Alexander',
            'email' => 'francis.alexander@gmail.com',
            'password' => Hash::make(12345678),
            'gender' => 'Male',
            'date_of_birth' => '2000-01-01',
            'image_path' => null,
            'role' => 'admin',
        ]);
    }
}
