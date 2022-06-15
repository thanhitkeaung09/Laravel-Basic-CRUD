<?php

namespace Database\Seeders;

use App\Models\Blog;
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
         \App\Models\User::factory(120)->create();
//        Blog::factory()->create([
//            "title" => "hello hello",
//            "description" => "hello lorem hello"
//        ]);
//
//        Blog::factory(55)->create();


    }
}
