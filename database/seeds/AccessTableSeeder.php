<?php

use Illuminate\Database\Seeder;

class AccessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('access')->insert([
            'name' => 'admin',
        ]);
        DB::table('access')->insert([
            'name' => 'worker',
        ]);
        DB::table('access')->insert([
            'name' => 'user',
        ]);
    }
}
