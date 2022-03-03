<?php

namespace App\Models;
use App\Models\Role_Permission;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permissions';

    protected $fillable = ['permission_name','role_id'];

    public function role_permission()
    {
        return $this->hasMany(Role_Permission::class,'permission_id', 'id');
    }
}