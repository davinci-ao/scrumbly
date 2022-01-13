<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name' => 'project1',
            'invite_link' => 'project1_invite_link',
            'discription' => 'Beschrijving',
            'slug' => 'project1',
            'team_id' => 1,
        ]);

        DB::table('projects')->insert([
            'name' => 'project1',
            'invite_link' => 'project1_invite_link',
            'discription' => 'Beschrijving',
            'slug' => 'project1',
            'team_id' => 1,
        ]);

        DB::table('projects')->insert([
            'name' => 'project1',
            'invite_link' => 'project1_invite_link',
            'discription' => 'Beschrijving',
            'slug' => 'project1',
            'team_id' => 1,
        ]);

        DB::table('projects')->insert([
            'name' => 'project2',
            'invite_link' => 'project2_invite_link',
            'discription' => 'Beschrijving',
            'slug' => 'project2',
            'team_id' => 2,
        ]);
    }
}
