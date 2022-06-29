<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasMany(User::class, 'role_id', 'id');
    }

    public function wall()
    {
        return $this->hasMany(Wall::class, 'role_id', 'id');
    }
}
