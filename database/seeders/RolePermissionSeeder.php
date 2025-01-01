<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            // Buat role Admin jika belum ada
            $adminRole = Role::firstOrCreate(['name' => 'Admin']);

            // Ambil semua permissions yang ada
            $permissions = Permission::all();

            if ($permissions->isNotEmpty()) {
                // Hubungkan role Admin dengan semua permission
                $adminRole->syncPermissions($permissions);
            }

            // Ambil user pertama sebagai contoh (ubah sesuai kebutuhan)
            $adminUser = User::first();

            if ($adminUser) {
                // Berikan role Admin ke user
                $adminUser->assignRole($adminRole);

                // (Opsional) Berikan semua permissions langsung ke user
                foreach ($permissions as $permission) {
                    $adminUser->givePermissionTo($permission);
                }
            } else {
                $this->command->warn('Tidak ada user ditemukan untuk diberikan role Admin.');
            }
        } catch (\Exception $e) {
            $this->command->error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
