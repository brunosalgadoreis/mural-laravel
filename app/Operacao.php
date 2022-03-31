<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    protected $table = 'operacaos';

    protected $fillable = ['nome'];

    public function user()
    {
        return $this->hasMany(User::class, 'operacao_id', 'id');
    }

    public function mural()
    {
        return $this->hasMany(Mural::class, 'operacao_id', 'id');
    }
}
