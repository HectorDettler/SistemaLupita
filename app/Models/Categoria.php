<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categoria extends Model
{
    
    use HasFactory;
    public function marcas()
    {
        return $this->belongsToMany(Marca::class, 'categoria_marca', 'categoria_id', 'marca_id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
