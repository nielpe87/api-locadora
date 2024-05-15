<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fone extends Model
{
    use HasFactory;

    protected $table = "fones";

    protected $guarded = [];

    public function cliente(){
        return $this->belongsTo(Cliente::class,'cliente_id', 'id');
    }
}
