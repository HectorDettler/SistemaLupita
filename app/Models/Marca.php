<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{

    protected $fillable = ['name'];
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_marca');
    }
}
