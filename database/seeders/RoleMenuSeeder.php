<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Spatie\Permission\Models\Role;

class RoleMenuSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'Admin')->first();
        $bendaharaRole = Role::where('name', 'Bendahara')->first();
        $userRole = Role::where('name', 'Staff')->first();

        $dashboardMenu = Menu::where('name', 'Dashboard')->first();
        $usersMenu = Menu::where('name', 'Users')->first();
        $reportsMenu = Menu::where('name', 'Reports')->first();

        // Assigning menu to roles
        $adminRole->menus()->attach([
            $dashboardMenu->id,
            $usersMenu->id,
            $reportsMenu->id,
        ]);

        $bendaharaRole->menus()->attach([
            $dashboardMenu->id,
            $reportsMenu->id,
        ]);

        $userRole->menus()->attach([
            $dashboardMenu->id,
        ]);
    }
}
