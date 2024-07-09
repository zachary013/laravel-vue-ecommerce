<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::create([
            'name' => 'Zara',
            'slug'=>'zara'
        ]);
        Brand::create([
            'name' => 'H&M',
            'slug'=>'h-and-m'
        ]);
        Brand::create([
            'name' => 'Calvin Klein',
            'slug'=>'calvin-klein'
        ]);
    }
}
