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
            'Football' => [
                ['name' => 'Premier League'],
                ['name' => 'La Liga'],
                ['name' => 'Serie A'],
            ],
            'Cricket' => [
                ['name' => 'IPL'],
                ['name' => 'BBL'],
                ['name' => 'PSL'],
            ],
            'Basketball' => [
                ['name' => 'NBA'],
                ['name' => 'EuroLeague'],
            ],
            'Tennis' => [
                ['name' => 'ATP'],
                ['name' => 'WTA'],
            ],
            'Boxing' => [
                ['name' => 'WBC'],
                ['name' => 'WBA'],
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