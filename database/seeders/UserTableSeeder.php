<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'first_name' => 'Sak',
                'last_name' => 'Ousa',
                'name' => 'Aminuser',
                'email' => 'sakousa@example.com',
                'password' => Hash::make('password'),
                'photo' => null,
                'phone' => '12345678',
                'address' => 'Kampong Thom Province',
                'role' => 'admin',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Sak',
                'last_name' => 'Phanha',
                'name' => 'Aminuser',
                'email' => 'sakphanha@example.com',
                'password' => Hash::make('password'),
                'photo' => null,
                'phone' => '12345678',
                'address' => 'Kampong Thom Province',
                'role' => 'admin',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'leav',
                'last_name' => 'sis',
                'name' => 'Aminuser',
                'email' => 'leavsis@example.com',
                'password' => Hash::make('password'),
                'photo' => null,
                'phone' => '12345678',
                'address' => 'Kampong Thom Province',
                'role' => 'admin',
                'status' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
