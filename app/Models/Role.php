<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Role_Permission;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = ['role_name'];

    public function role_permission()
    {
        return $this->hasMany(Role_Permission::class,'role_id','id');
    }
}
