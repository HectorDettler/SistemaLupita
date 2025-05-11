<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function detallesVenta(){
        return $this->hasMany(DetalleVenta::class, 'id_venta');
    }

    public function tipoPago()
    {
        return $this->belongsTo(TipoPago::class);
    }
}
