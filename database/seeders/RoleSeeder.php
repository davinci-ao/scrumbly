<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'developer',
        ]);

        DB::table('roles')->insert([
            'name' => 'project-owner',
        ]);

        DB::table('roles')->insert([
            'name' => 'stakeholder',
        ]);

        DB::table('roles')->insert([
            'name' => 'scrum-master',
        ]);
    }
}