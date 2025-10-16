<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Football'],
            ['name' => 'Cricket'],
            ['name' => 'Basketball'],
            ['name' => 'Tennis'],
            ['name' => 'Boxing'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}