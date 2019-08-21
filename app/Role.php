<?php

namespace Corp;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public function users(){
        return $this->belongsToMany('Corp\User', 'user_roles');
    }
    public function permissions(){
        return $this->belongsToMany('Corp\Permission', 'role_permissions', 'roleId', 'permissionId');
    }
    public function hasPermission($name, $require = false)
    {
        if (is_array($name)) {
            foreach ($name as $permissionName) {
                $hasPermission = $this->hasPermission($permissionName);

                if ($hasPermission && !$require) {
                    return true;
                } elseif (!$hasPermission && $require) {
                    return false;
                }
            }
            return $require;
        } else {
            foreach ($this->permissions as $permission) {
                if ($permission->name == $name) {
                    return true;
                }
            }
        }

        return false;
    }

    public function savePermissions($inputPermissions) {
       // dd($inputPermissions);
        if(!empty($inputPermissions)) {
            $this->permissions()->sync($inputPermissions);
        }
        else {
            $this->permissions()->detach();
        }

        return TRUE;
    }
}
