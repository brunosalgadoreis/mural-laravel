<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wall extends Model
{
    protected $table = 'walls';

    protected $fillable = ['title', 'role_id', 'operation_id', 'user_id', 'post'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function operation()
    {
        return $this->belongsTo(Operation::class, 'operation_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
