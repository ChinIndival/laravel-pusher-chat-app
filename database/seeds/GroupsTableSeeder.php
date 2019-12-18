<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'name' => 'Group 1',
        ]);
        DB::table('groups')->insert([
            'name' => 'Group 2',
        ]);
        DB::table('groups')->insert([
            'name' => 'Group 3',
        ]);
        DB::table('groups')->insert([
            'name' => 'Group 4',
        ]);
        DB::table('groups')->insert([
            'name' => 'Group 5',
        ]);
    }
}
