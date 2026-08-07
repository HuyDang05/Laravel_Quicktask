<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

    $this->call([
    SuperAdminSeeder::class,
    ]);

    User::factory(5)->create()->each(function ($user) {
        $user->tasks()->createMany(
            \App\Models\Task::factory(3)->make()->toArray()
            );
        });
    }
}
