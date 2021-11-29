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
            'team_id' => 1,
        ]);
    }
}
