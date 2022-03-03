<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\DropzoneController;
use App\Http\Controllers\LeaveController;
use App\Models\Role;
use App\Models\Permission;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Hash Password

Route::get('', [DashboardController::class, 'viewadminpanel'])->name('adminpanel-homepage');
Route::get('index', [DashboardController::class, 'showDashboard'])->middleware('authcheck')->name('dashboard.index');

// Authentication
Route::get('login', [UserController::class,'viewlogin'])->name('login');
Route::post('login', [UserController::class,'login'])->name('login');
Route::get('logout', [UserController::class,'logout']);
Route::get('forgot-password', [UserController::class,'viewforgotpassword']);
Route::post('forgot-password', [UserController::class,'forgotpassword']);
Route::get('reset-password/{token}', [UserController::class,'viewresetpassword'])->name('reset-password');
Route::post('update-password', [UserController::class,'updatepassword'])->name('update-password');

// User Management
Route::group(['prefix' => 'user','middleware' => 'authcheck'], function () {
Route::get('user-addview', [UserController::class,'user_addview'])->middleware('permissioncheck:user_create');
Route::post('user-add', [UserController::class,'user_add'])->middleware('permissioncheck:user_create');
Route::get('user-view', [UserController::class,'user_view'])->middleware('permissioncheck:user_list')->name('user-view');
Route::get('user-edit/{id}', [UserController::class,'user_edit'])->middleware('permissioncheck:user_edit');
Route::post('user-update/{id}', [UserController::class,'user_update'])->middleware('permissioncheck:user_edit');
Route::get('user-delete/{id}', [UserController::class,'user_delete'])->middleware('permissioncheck:user_delete');
Route::get('user-add', function () {
    $roledata = Role::all()->whereNotIn('id',[1]);
    return view('adminpanel.user.add', compact('roledata'));
});
});

// Profile Management
Route::get('profile-edit/{token}', [UserController::class, 'profile_edit'])->name('profile-edit');
Route::post('profile-update/{id}', [UserController::class, 'profile_update'])->name('profile-update');

Route::get('my-profile', [UserController::class, 'my_edit_profile']);
Route::post('update-myprofile/{id}', [UserController::class, 'myprofile_update']);

Route::post('edufiles',[DropzoneController::class, 'edustore'])->name('edufile.store');
Route::post('edufiles/remove', [DropzoneController::class, 'eduremvoeFile'])->name('edufile.remove');

Route::post('profiles',[DropzoneController::class, 'prostore'])->name('profile.store');
Route::post('profiles/remove', [DropzoneController::class, 'proremvoeFile'])->name('profile.remove');

// Permission Management
Route::group(['prefix' => 'permission','middleware' => 'authcheck'], function () {

    
Route::get('permission-addview', [PermissionController::class,'permission_addview'])->middleware('permissioncheck:permission_create')->name('permission-addview');


Route::post('permission-add', [PermissionController::class,'permission_add'])->middleware('permissioncheck:permission_create')->name('permission-add');
Route::get('permission-view', [PermissionController::class,'permission_view'])->middleware('permissioncheck:permission_list')->name('permission-view');
Route::get('permission-edit/{id}', [PermissionController::class,'permission_edit'])->middleware('permissioncheck:permission_edit')->name('permission-edit');
Route::post('permission-update/{id}', [PermissionController::class,'permission_update'])->middleware('permissioncheck:permission_edit')->name('permission-update');
Route::get('permission-addview', function () {
    $permissiondata = Permission::all();
    $roledata = Role::all()->whereNotIn('id', [1,5]);
    return view('adminpanel.permission.add', compact('permissiondata', 'roledata'));
});
});

// Leave Management
Route::get('leave-addview', [LeaveController::class,'leave_addview']);
Route::post('leave-add', [LeaveController::class,'leave_add']);
Route::get('leave-view', [LeaveController::class,'leave_view'])->name('leave-view');