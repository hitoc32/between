<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            NationSeeder::class,
            PostSeeder::class,
            Border_controlSeeder::class,
            FacilitySeeder::class,
            TransportationSeeder::class,
            CommentSeeder::class,
            Comment_categorySeeder::class,
            LikeSeeder::class,
            ]);
            
            
            
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
