<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arqueo extends Model
{
    use HasFactory;

    public function movimientos(){
        return $this->hasMany(MovimientoCaja::class);
    }
}
