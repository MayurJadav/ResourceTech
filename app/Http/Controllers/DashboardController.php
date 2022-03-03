<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function viewadminpanel()
    {
        return view('adminpanel.authentication.login');
    }
    
    public function showDashboard(Request $request)
    {
        $usercount = User::count();
        $permissioncount = Permission::count();
        return view('adminpanel.index',compact('usercount','permissioncount'));
    }
}