<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::all()->each(function (Category $category) {
            factory(Article::class, random_int(1, 10))->create(['category_id' => $category->id]);
        });
    }
}
