<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Role_Permission;

class PermissionController extends Controller
{
    public function permission_view()
    {
        $data = Permission::paginate(10);
        return view('adminpanel.permission.view', compact('data'));
    }

    public function permission_addview()
    {
        return view('adminpanel.permission.add');
    }

    public function permission_add(Request $request)
    {
        if (checkPermission('permission_create')) {

        $request->validate([
            'permission_id' => 'required|numeric',
            'role_id' => 'required|numeric'
         ]);

         $aasignpermission = new Role_Permission();
 
         $permissions = Role_Permission::where('permission_id',$request->permission_id)->get();
         $permissions2 = Role_Permission::where('role_id',$request->role_id)->get();
         $rolecheck = "";
         foreach ($permissions as $roles) {
             if ($roles->role_id == $request->role_id) {
                 $rolecheck = 1;
             }
         }
         $permissioncheck ="";
         foreach ($permissions2 as $permission) {
             if ($permission->permission_id == $request->permission_id) {
                 $permissioncheck = 1;
             }
         }
         if ($rolecheck == 1 || $permissioncheck == 1) {
             return redirect()->back()->with('error','Permision already assigned');
         }else{
             $aasignpermission->permission_id = $request->post('permission_id');
             $aasignpermission->role_id = $request->post('role_id');
             $aasignpermission->save();
             return redirect()->back()->with('success','Permision has been added');    
         }
        }
    }

    public function permission_edit($id)
    {
        $roledata = Role_Permission::where('permission_id', $id)->get();
        if($roledata->isEmpty()){
            return back()->with('error', 'No role assigned to permission');
        }
        if (checkPermission('permission_edit')) {
            $editdata = Role_Permission::where('permission_id', $id)->get();
            return view('adminpanel.permission.edit', ['editdata' => $editdata, 'permission_id' => $id]);
        } else {
            return redirect('index');
        }
    }

    public function permission_update(Request $request, $id)
    {
        if (checkPermission('permission_edit')) {
            if (!empty($request->roles)) {
                $updatepermission = Role_Permission::where('permission_id', $id)->whereNotIn('role_id', $request->roles)->delete();
                return redirect()->back();
            } else {
                $updatepermission = Role_Permission::where('permission_id', $id)->delete();
                return redirect('permission/permission-view')->with('success', 'Permission has been updated');
            }
        } else {
            return redirect('index');
        }
    }
}