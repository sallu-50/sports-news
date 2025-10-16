<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence;
        $category = Category::inRandomOrder()->first();
        $subcategory = Subcategory::where('category_id', $category->id)->inRandomOrder()->first();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraphs(3, true),
            'author' => $this->faker->name,
            'image' => 'articles/' . $this->faker->numberBetween(1, 3) . '.jpg',
            'category_id' => $category->id,
            'subcategory_id' => $subcategory ? $subcategory->id : Subcategory::factory(),
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}