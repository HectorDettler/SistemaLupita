<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TmpVenta extends Model
{
    use HasFactory;

    protected $fillable = ['cantidad', 'id_producto', 'session_id', 'precio_unitario'];
    public function producto(){
        return $this->belongsTo(Producto::class, 'id_producto');
        
    }
}
