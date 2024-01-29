<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $primaryKey = 'role_id';
    protected $fillable = ['role_name'];
    public function users()
    {
        return $this->belongsToMany(User::class, 'avoirUserRole', 'role_id', 'user_id');
    }

    public function privileges()
    {
        return $this->belongsToMany(Privilege::class, 'avoirRolePrivilege', 'role_id', 'privilege_id');
    }
}
