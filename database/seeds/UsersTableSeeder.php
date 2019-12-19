<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'tinh',
            'email' => 'tinh1@gmail.com',
            'avatar' => 'user-profile.png',
            'password' => bcrypt('tinhhang'),
        ]);
        DB::table('users')->insert([
            'name' => 'hang',
            'email' => 'tinh2@gmail.com',
            'avatar' => 'user-profile.png',
            'password' => bcrypt('tinhhang'),
        ]);
        DB::table('users')->insert([
            'name' => 'thien',
            'email' => 'tinh3@gmail.com',
            'avatar' => 'user-profile.png',
            'password' => bcrypt('tinhhang'),
        ]);
        DB::table('users')->insert([
            'name' => 'hung',
            'email' => 'tinh4@gmail.com',
            'avatar' => 'user-profile.png',
            'password' => bcrypt('tinhhang'),
        ]);
        DB::table('users')->insert([
            'name' => 'thuong',
            'email' => 'tinh5@gmail.com',
            'avatar' => 'user-profile.png',
            'password' => bcrypt('tinhhang'),
        ]);
        DB::table('users')->insert([
            'name' => 'tinhhang',
            'email' => 'tinh6@gmail.com',
            'avatar' => 'user-profile.png',
            'password' => bcrypt('tinhhang'),
        ]);
    }
}
