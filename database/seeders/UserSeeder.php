<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        $adminUser = User::firstOrCreate([
            'email' => 'admin@example.com'
        ], [
            'name' => 'Admin User',
            'username' => 'admin',
            'password' => Hash::make('password')
        ]);

        $adminUser->assignRole('admin');

        // Create operator user
        $operatorUser = User::firstOrCreate([
            'email' => 'operator@example.com'
        ], [
            'name' => 'Operator User',
            'username' => 'operator',
            'password' => Hash::make('password')
        ]);
        // $operatorUser->assignRole('operator');

        $this->command->info('Roles, permissions, and users have been seeded successfully.');
    }
}
