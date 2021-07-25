<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'parentId' => 0,
            'status' => 1,
            'name' => 'Thoi du lich bien',
            'description' => 'thoi trang cho di choi - du lich tam bien',
            'avatar' => null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ]);
    }
}
