<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([
            'id_user_send' => '1',
            'id_user_received' => '1',
            'content' => 'Hello',
            'id_group' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('messages')->insert([
            'id_user_send' => '1',
            'id_user_received' => '2',
            'content' => 'Hello',
            'id_group' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('messages')->insert([
            'id_user_send' => '1',
            'id_user_received' => '3',
            'content' => 'Hello',
            'id_group' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('messages')->insert([
            'id_user_send' => '1',
            'id_user_received' => '2',
            'content' => 'Hi',
            'id_group' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('messages')->insert([
            'id_user_send' => '1',
            'id_user_received' => null,
            'content' => 'Hello',
            'id_group' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
