<?php

use App\Models\Role;
use App\Models\Role_Permission;
use App\Models\User;

function checkpermission($permission_slug)
{
    if (Session('auth') == getAdminId()) return true;
    $user = User::where('id', Session('auth'))->first();
    $permissions = [];

    $role_permission = $user->role->role_permission;
    for ($i = 0; $i < count($role_permission); $i++) {
        array_push($permissions, $role_permission[$i]->permission->permission_slug);
    }
    return in_array($permission_slug, $permissions);
}

function getAdminId()
{
    return 1;
}

function getCurrentUser()
{
    return User::where('id', Session('auth'))->first();
}

function is_in_assoc_array($findKey, $findValue, array $array)
{
    foreach ($array as $value) {
        if ($value[$findKey] == $findValue) {
            return true;
        }
    }
    return false;
}