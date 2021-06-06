<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'name' => Str::random(10),
            'telephone' => 111111,
            'email' => 'a@a',
            'password' => Hash::make('a@a_aaaaaa'),
            'access_id' => 1,
            'email_verified'=>true,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'telephone' => 111111,
            'email' => 'w@w',
            'password' => Hash::make('w@w_aaaaaa'),
            'access_id' => 2,
            'email_verified'=>true,
        ]);
        DB::table('users')->insert([
            'name' => Str::random(10),
            'telephone' => 111111,
            'email' => 'u@u.com',
            'password' => Hash::make('u@u.com_aaaaaa'),
            'access_id' => 3,
            'email_verified'=>true,
        ]);
        DB::table('chats')->insert([
            'user_id' => 3,
        ]);
    }
}
