<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'кольца',
        ]);
        DB::table('categories')->insert([
            'name' => 'браслеты',
        ]);
        DB::table('categories')->insert([
            'name' => 'цепочки',
        ]);
    }
}
