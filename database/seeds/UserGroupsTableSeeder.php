<?php

use Illuminate\Database\Seeder;

class UserGroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_groups')->insert([
            'id_user' => '1',
            'id_group' => '1',
        ]);
        DB::table('user_groups')->insert([
            'id_user' => '1',
            'id_group' => '2',
        ]);
        DB::table('user_groups')->insert([
            'id_user' => '2',
            'id_group' => '1',
        ]);
        DB::table('user_groups')->insert([
            'id_user' => '3',
            'id_group' => '1',
        ]);
        DB::table('user_groups')->insert([
            'id_user' => '2',
            'id_group' => '2',
        ]);
    }
}
