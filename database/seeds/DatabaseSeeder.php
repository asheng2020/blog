<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminTablesSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}
