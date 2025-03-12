<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Marca extends Model
{

    use HasFactory;
    
    protected $fillable = ['name'];
    public function categorias()
    {
        return $this->belongsToMany(Categoria::class, 'categoria_marca', 'marca_id', 'categoria_id');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
