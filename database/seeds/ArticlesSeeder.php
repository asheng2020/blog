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
            factory(Article::class, 20)->create(['category_id' => $category->id]);
        });
    }
}
