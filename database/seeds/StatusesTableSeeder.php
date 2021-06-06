<?php

use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'name' => 'В очереди',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Выполняется',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Готово',
        ]);
        DB::table('statuses')->insert([
            'name' => 'Завершённый заказ',
        ]);
    }
}
