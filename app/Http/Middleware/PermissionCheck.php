<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $permission_slug = 'nothing')
    {
        if (Session('role_id') == getAdminId()) return $next($request);
        $user = getCurrentUser();
        $permissions = [];

        $role_permission = $user->role->role_permission;
        for ($i = 0; $i < count($role_permission); $i++) {
            array_push($permissions, $role_permission[$i]->permission->permission_slug);
        }
        if (in_array($permission_slug, $permissions)) {
            return $next($request);
        } else {
            return redirect('index');
        }
    }
}