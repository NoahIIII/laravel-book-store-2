<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Banner;
use App\Models\Book;
use App\Models\Branche;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\User;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::factory()->count(20)->create();
        // Book::factory()->count(50)->create();
        // Contact::factory()->count(50)->create();
        // Order::factory()->count(50)->create();
        // Branche::factory()->count(5)->create();
        // Banner::factory()->count(2)->create();
        // Category::factory()->count(2)->create();


    }
}
