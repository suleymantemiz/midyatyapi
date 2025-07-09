<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Süleyman Superman',
            'email' => 'supermansuleyman@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Estate seeder'ını çalıştır
        $this->call([
            EstateSeeder::class,
            EstateImageSeeder::class,
            ReviewSeeder::class,
            AboutContentSeeder::class,
            ServiceContentSeeder::class,
            ContactContentSeeder::class,
            HomeContentSeeder::class,
        ]);
    }
}
