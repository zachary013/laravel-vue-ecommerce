<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'T-Shirts',
            'slug'=>'t-shirts'
        ]);
        Category::create([
            'name' => 'Sweaters',
            'slug'=>'sweaters'
        ]);
        Category::create([
            'name' => 'Shorts',
            'slug'=>'shorts'
        ]);
        Category::create([
            'name' => 'Skirts',
            'slug'=>'skirts'
        ]);
    }
}
