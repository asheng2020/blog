<?php

use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Comment;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Comment::class, 100)->create(['article_id' => 0]);
        Article::all()->each(function (Article $article) {
            factory(Comment::class, 50)->create(['article_id' => $article->id]);
        });
    }
}
