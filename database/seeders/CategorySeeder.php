<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Computer Science'
            ],
            [
                'category_name' => 'Artificial Intelligence'
            ],
            [
                'category_name' => 'Machine Learning'
            ],
            [
                'category_name' => 'Deep Learning'
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
