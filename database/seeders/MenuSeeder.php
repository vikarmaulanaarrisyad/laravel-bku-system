<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    public function run()
    {
        // Menu utama
        $dashboard = Menu::create([
            'name' => 'Dashboard',
            'route' => '',
            'url' => '/dashboard',
            'icon' => 'fa-tachometer-alt',
            'parent_id' => null,
        ]);

        $users = Menu::create([
            'name' => 'Users',
            'route' => '',
            'url' => '/users',
            'icon' => 'fa-users',
            'parent_id' => null,
        ]);

        $reports = Menu::create([
            'name' => 'Reports',
            'route' => '',
            'url' => '/reports',
            'icon' => 'fa-chart-line',
            'parent_id' => null,
        ]);

        // Submenu Dashboard
        $profile = Menu::create([
            'name' => 'Profile',
            'route' => '',
            'url' => '/users/profile',
            'icon' => 'fa-user',
            'parent_id' => $users->id,
        ]);

        // Submenu Users
        $manageUsers = Menu::create([
            'name' => 'Manage Users',
            'route' => '',
            'url' => '/users/manage',
            'icon' => 'fa-cogs',
            'parent_id' => $users->id,
        ]);

        // Submenu Reports
        $salesReport = Menu::create([
            'name' => 'Sales Report',
            'route' => '',
            'url' => '/reports/sales',
            'icon' => 'fa-file-alt',
            'parent_id' => $reports->id,
        ]);
    }
}
