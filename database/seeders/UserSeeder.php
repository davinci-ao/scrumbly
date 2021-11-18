<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Hash;

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
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'rights' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@user.com',
            'password' => Hash::make('user1'),
            'rights' => 'user',
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'email' => 'user2@user.com',
            'password' => Hash::make('user2'),
            'rights' => 'user',
        ]);
    }
}