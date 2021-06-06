<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Продук 1',
            'description' => 'Описание 1',
            'price' => '1',
            'category_id'=>1,
        ]);
        DB::table('products')->insert([
            'name' => 'Продук 2',
            'description' => 'Описание 12',
            'price' => '12',
            'category_id'=>2,
        ]);
        DB::table('products')->insert([
            'name' => 'Продук 3',
            'description' => 'Описание 123',
            'price' => '13',
            'category_id'=>3,
        ]);
    }
}
