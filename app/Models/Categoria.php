<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function marcas()
{
    return $this->belongsToMany(Marca::class, 'categoria_marca');
}
}
