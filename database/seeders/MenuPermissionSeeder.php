<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use Spatie\Permission\Models\Permission;

class MenuPermissionSeeder extends Seeder
{
    public function run()
    {
        $viewDashboardPermission = Permission::where('name', 'view_dashboard')->first();
        $manageUsersPermission = Permission::where('name', 'manage_users')->first();
        $editProfilePermission = Permission::where('name', 'edit_profile')->first();
        $viewReportsPermission = Permission::where('name', 'view_reports')->first();

        $dashboardMenu = Menu::where('name', 'Dashboard')->first();
        $usersMenu = Menu::where('name', 'Users')->first();
        $ManageUsersMenu = Menu::where('name', 'Manage Users')->first();
        $reportsMenu = Menu::where('name', 'Reports')->first();

        // Assigning permissions to menus
        $dashboardMenu->permissions()->attach($viewDashboardPermission->id);
        $usersMenu->permissions()->attach($manageUsersPermission->id);
        $ManageUsersMenu->permissions()->attach($manageUsersPermission->id);
        $usersMenu->permissions()->attach($editProfilePermission->id);
        $reportsMenu->permissions()->attach($viewReportsPermission->id);
    }
}
