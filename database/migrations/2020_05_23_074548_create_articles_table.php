<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * 标题，封面，内容简要，内容，分类，标签，阅读数，评论数，是否显示
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('cover');
            $table->string('description');
            $table->text('content');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->string('tag');
            $table->unsignedInteger('read_count')->default(0);
            $table->unsignedInteger('comment_count')->default(0);
            $table->boolean('on_show')->default(true);
            $table->boolean('is_top')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
