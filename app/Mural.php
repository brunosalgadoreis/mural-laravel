<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mural extends Model
{
    protected $table = 'murals';

    protected $fillable = ['titulo', 'cargo_id', 'operacao_id', 'post'];

    public function cargo()
    {
        return $this->belongsTo(Cargo::class, 'cargo_id', 'id');
    }

    public function operacao()
    {
        return $this->belongsTo(Operacao::class, 'operacao_id', 'id');
    }
}
