<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            'ফুটবল' => [
                ['name' => 'প্রিমিয়ার লীগ'],
                ['name' => 'লা লিগা'],
                ['name' => 'সেরি এ'],
            ],
            'ক্রিকেট' => [
                ['name' => 'আইপিএল'],
                ['name' => 'বিবিএল'],
                ['name' => 'পিএসএল'],
            ],
            'বাস্কেটবল' => [
                ['name' => 'এনবিএ'],
                ['name' => 'ইউরোলীগ'],
            ],
            'টেনিস' => [
                ['name' => 'এটিপি'],
                ['name' => 'ডব্লিউটিএ'],
            ],
            'বক্সিং' => [
                ['name' => 'ডব্লিউবিসি'],
                ['name' => 'ডব্লিউবিএ'],
            ],
        ];

        foreach ($subcategories as $categoryName => $categorySubcategories) {
            $category = Category::where('name', $categoryName)->first();

            if ($category) {
                foreach ($categorySubcategories as $subcategory) {
                    Subcategory::firstOrCreate([
                        'name' => $subcategory['name'],
                        'category_id' => $category->id,
                    ]);
                }
            }
        }
    }
}