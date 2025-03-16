<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Category;
use App\Models\Post;
use App\Models\Role;
use App\Models\Tag;
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
        User::factory()->count(40)->create();
        Tag::factory()->count(50)->create();
        Category::factory()->count(20)->create();
        Post::factory()->count(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
    }
}
