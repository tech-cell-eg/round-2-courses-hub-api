<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Web Development',
            'Mobile Development',
            'Data Science',
            'Cybersecurity',
            'Cloud Computing',
            'Artificial Intelligence',
            'Game Development',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
