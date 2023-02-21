<?php

namespace App\Traits;

use App\Models\Role;
use App\Models\Permission;

trait HasPermissions {

    public function hasPermissionTo($permission) {
        return $this->hasPermissionThroughRole($permission) || $this->hasPermission($permission);
    }

    public function refreshRole(Role $role) {
        $this->roles()->detach();
        $this->roles()->attach($role);
    }

    public function hasPermissionThroughRole($permission) {
        foreach ($permission->roles as $role) {
            if($this->roles->contains($role)) {
                return true;
            }
        }
        return false;
    }

    protected function hasPermission($permission) {
        return (bool) $this->permissions->where('name', $permission->name)->count();
    }

    public function roles() {
        return $this->belongsToMany(Role::class,'users_roles');
    }
    public function permissions() {
        return $this->belongsToMany(Permission::class,'users_permissions');
    }
}
