<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Seeder master
        $this->call([
            PekerjaanSeeder::class,
            PegawaiSeeder::class,
        ]);

        // User admin
        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
        ]);
    }
}
