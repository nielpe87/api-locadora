<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";

    public function fones(){
        return $this->hasMany(Fone::class,'cliente_id', 'id');
    }
}
