<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    use HasFactory;

    protected $table = "filmes";

    public function categorias(){
        return $this->belongsToMany(Categoria::class, "categoria_filme", "filme_id", "categoria_id");
    }
}
