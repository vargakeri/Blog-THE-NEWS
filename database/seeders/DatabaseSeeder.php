<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $categories = Category::all();

        foreach($categories as $category) {
            Article::factory(4)->create(['category_id' => $category->id]);
        }

        foreach (Article::all() as $article) {
            $article->slug = Str::slug($article->title);
            $article->save();
        }
    }
}
