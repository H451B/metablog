<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categories = BlogCategory::all();
        $authors = User::all();

        for ($i = 0; $i < 10; $i++) {
            $category = $categories->random();
            $author = $authors->random();

            Blog::create([
                'blog_category_id' => $category->id,
                'user_id' => $author->id,
                'title' => $faker->sentence,
                'slug' => Str::slug($faker->sentence),
                'banner' => 'banner' . ($i + 1) . '.jpg', // Assumes you have banners named banner1.jpg, banner2.jpg, etc.
                'article' => $faker->paragraphs(3, true),
                // 'tags' => implode(',', $faker->words(3)),
                'show_home' => 0,
                'status' => 1,
            ]);
        }
    }
}
