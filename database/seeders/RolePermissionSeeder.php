<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles
        $roles = [
            'admin',
            'operator'
        ];

        // Define permissions
        $permissions = [
            'view budgets',
            'create budgets',
            'edit budgets',
            'delete budgets',
            'view reports',
            'create expenses',
            'edit expenses',
            'delete expenses',
        ];

        // Create roles
        foreach ($roles as $roleName) {
            $role = Role::firstOrCreate(['name' => $roleName]);
        }

        // Create permissions and assign to roles
        foreach ($permissions as $permissionName) {
            $permission = Permission::firstOrCreate(['name' => $permissionName]);

            if ($permissionName === 'view reports') {
                $role = Role::where('name', 'operator')->first();
                $role->givePermissionTo($permission);
            } else {
                $role = Role::where('name', 'admin')->first();
                $role->givePermissionTo($permission);
            }
        }
    }
}
