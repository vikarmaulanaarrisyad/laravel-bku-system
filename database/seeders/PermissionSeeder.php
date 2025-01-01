<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'view_dashboard']);
        Permission::create(['name' => 'manage_users']);
        Permission::create(['name' => 'edit_profile']);
        Permission::create(['name' => 'view_reports']);

        
    }
}
