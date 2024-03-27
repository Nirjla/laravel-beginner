<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::truncate();
        // Category::truncate();
        // // $timestamp = now();
        $user = \App\Models\User::factory()->create([
            'name' => 'John Doe'
        ]);
        $category = Category::factory()->create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        $category = Category::factory()->create([
            'name' => 'Work',
            'slug' => 'work',
        ]);
        $category = Category::factory()->create([
            'name' => 'Hobbies',
            'slug' => 'hobbies',
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id,
            'category_id' => $category->id

        ]);
        // $category =  \App\Models\Category::create([

        //     'name' => 'Personal',
        //     'slug' => 'personal',
        // ]);
        // $category =  \App\Models\Category::create([

        //     'name' => 'Work',
        //     'slug' => 'work',
        // ]);
        // $category =  \App\Models\Category::create([
        //         'name' => 'Hobbies',
        //         'slug' => 'hobbies',

        // ]);
        // \App\Models\Post::create([
        //     'user_id' => $users->id,
        //     'category_id' => $category->id,
        //     'slug' => 'my-first-post',
        //     'title' => 'My First Post',
        //     'excerpt' => 'My first post is my first post okay',
        //     'body' => 'My first post is first body is bosdfh fjkfbvjh',



        // ]);
        // \App\Models\Post::create([
        //     'user_id' => $users->id,
        //     'category_id' => $category->id,
        //     'slug' => 'my-second-post',
        //     'title' => 'My Second Post',
        //     'excerpt' => 'My second post is my second post okay',
        //     'body' => 'My second post is second body is bosdfh fjkfbvjh',



        // ]);
        // \App\Models\Post::create([
        //     'user_id' => $users->id,
        //     'category_id' => $category->id,
        //     'slug' => 'my-third-post',
        //     'title' => 'My Third Post',
        //     'excerpt' => 'My third post is my third post okay',
        //     'body' => 'My third post is second body is bosdfh fjkfbvjh',



        // ]);


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
