<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // 5 main categry
        $categories = [
            'Tech', 'health', 'Sport', 'Entertainment', 'Crypto'
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category,
                'slug' => Str::slug($category),
            ]);
        }

        // Atau menggunakan factory
        // Category::factory()->count(10)->create();
    }
}