<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call([
            // Deve andare prima il Type, perchè prima avrò un tipo di progetto e poi un progetto.
            // Nel db seeder, non è come le migrations che stabiliscono in modo temporale l'ordine.
            // Qui dobbiamo dare noi l'ordine
            TypeSeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
