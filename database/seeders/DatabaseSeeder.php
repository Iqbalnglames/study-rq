<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 7; $i <= 12; $i++) {
            \App\Models\ClassLevel::create([
                'name' => 'Kelas ' . $i,
                'slug' => 'kelas-' . $i,
            ]);
        }
    }
}
