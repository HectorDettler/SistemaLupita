<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    
    use HasFactory;
    protected $fillable = ['nombre_producto'];


    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function marca()
{
    return $this->belongsTo(Marca::class, 'id_marca');
}
}
