<?php

namespace Database\Factories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

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
        $fakerBn = FakerFactory::create('bn_BD');

        $title = $fakerBn->sentence;
        $category = Category::inRandomOrder()->first();
        $subcategory = Subcategory::where('category_id', $category->id)->inRandomOrder()->first();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $fakerBn->paragraphs(3, true),
            'author' => $fakerBn->name,
            'image' => 'https://picsum.photos/' . $this->faker->numberBetween(600, 800) . '/' . $this->faker->numberBetween(400, 600) . '?random=' . $this->faker->unique()->randomNumber(),
            'category_id' => $category->id,
            'subcategory_id' => $subcategory ? $subcategory->id : Subcategory::factory(),
            'views' => $this->faker->numberBetween(0, 1000),
        ];
    }
}