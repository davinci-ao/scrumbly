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
            'name' => 'Scrum Master',
        ]);

        DB::table('roles')->insert([
            'name' => 'Developer',
        ]);

        DB::table('roles')->insert([
            'name' => 'Product Owner',
        ]);

        DB::table('roles')->insert([
            'name' => 'Stakeholder',
        ]);
    }
}