<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Blogcategory;
use App\Models\Blogtag;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  User::factory(1)->create();
        // Blogcategory::factory(20)->create();
        Blogtag::factory(10)->create();
        Blog::factory(50)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
