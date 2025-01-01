<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Menu extends Model
{
    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id');
    }

    /**
     * Get the permissions associated with the menu.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'menu_permission');
    }

    /**
     * Relasi dengan roles
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_menus');
    }
}
