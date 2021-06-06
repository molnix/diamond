<?php

use Illuminate\Database\Seeder;

class JobsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jobs')->insert([
            'worker_id'=>1,
            'client_id'=>2,
            'status_id'=>3,
            'name'=>'order1',
            'description'=>"description tutututututu",
            'price'=>1000000,
        ]);
        DB::table('jobs')->insert([
            'worker_id'=>2,
            'client_id'=>3,
            'status_id'=>3,
            'name'=>'order2',
            'description'=>"description tutututututu",
            'price'=>1000000,
        ]);
    }
}
