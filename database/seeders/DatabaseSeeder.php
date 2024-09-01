<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Testimonial;
use App\Models\Car;
use App\Models\Category;
use App\Models\Contact;




use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            TestimonialSeeder::class,
            CarSeederr::class,
            CategorySeeder::class,
            ContactSeeder::class,
           
        ]);
    }
}
