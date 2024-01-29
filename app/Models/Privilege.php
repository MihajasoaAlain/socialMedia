<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Privilege extends Model
{
    use HasFactory;
    protected $primaryKey = 'privilege_id';
    protected $fillable ='privilege_type';
    public function roles()
    {
        return $this->belongsToMany(Role::class, 'avoirRolePrivilege', 'privilege_id', 'role_id');
    }
}
