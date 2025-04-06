<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = "roles";
    protected $fillable = [
    	'name', 'description'
    ];

    public function users() {
    	return $this->hasMany('App\Models\User', 'role_id');
    }

    public function permissions() {
		return $this->belongsToMany('App\Models\Permission', 'role_permissions', 'role_id', 'permission_id');
    }
}
