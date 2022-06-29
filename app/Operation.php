<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $table = 'operations';

    protected $fillable = ['name'];

    public function user()
    {
        return $this->hasMany(User::class, 'operation_id', 'id');
    }

    public function wall()
    {
        return $this->hasMany(Wall::class, 'operation_id', 'id');
    }
}
