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
            'description' => 'Beschrijving',
            'slug' => 'project1',
            'team_id' => 1,
        ]);

        DB::table('projects')->insert([
            'name' => 'project2',
            'invite_link' => 'project2_invite_link',
            'description' => 'Beschrijving',
            'slug' => 'project2',
            'team_id' => 2,
        ]);

        
        DB::table('project_user')->insert([
            'project_id' => '1',
            'project_slug' => 'project1',
            'user_id' => '1',
            'role_id' => '1',
        ]);

        DB::table('project_user')->insert([
            'project_id' => '1',
            'project_slug' => 'project1',
            'user_id' => '2',
            'role_id' => '2',
        ]);

        DB::table('project_user')->insert([
            'project_id' => '1',
            'project_slug' => 'project1',
            'user_id' => '3',
            'role_id' => '3',
        ]);

        DB::table('project_user')->insert([
            'project_id' => '1',
            'project_slug' => 'project1',
            'user_id' => '4',
            'role_id' => '4',
        ]);
    }
}
