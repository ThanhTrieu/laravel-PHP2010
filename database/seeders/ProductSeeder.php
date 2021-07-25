<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'so mi nem',
            'slug' => 'so-mi-nem',
            'categories_id' => 1,
            'brands_id' => 13,
            'description' => 'ao so mi cong so nem chat luong cao',
            'image' => 'https://product.hstatic.net/200000182297/product/106_b8f32f1dc58943b1b8ac920ff6f55348_master.jpg',
            'price' => 337000,
            'quantity' => 10,
            'status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
    }
}
