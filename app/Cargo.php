<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'cargos';

    protected $fillable = ['nome'];

    public function user()
    {
        return $this->hasMany(User::class, 'cargo_id', 'id');
    }

    public function mural()
    {
        return $this->hasMany(Mural::class, 'cargo_id', 'id');
    }
}
