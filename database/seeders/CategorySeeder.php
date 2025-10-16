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
            ['name' => 'ফুটবল'],
            ['name' => 'ক্রিকেট'],
            ['name' => 'বাস্কেটবল'],
            ['name' => 'টেনিস'],
            ['name' => 'বক্সিং'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}