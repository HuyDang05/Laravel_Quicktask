<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@example.com'],
            [
                'full_name' => 'Super Admin',
                'phone' => '0900000000',
                'address' => 'Ha Noi',
                'role' => 'super_admin',
                'avatar' => null,
                'password' => 'password',
                'is_active' => true,
            ]
        );
    }
}
