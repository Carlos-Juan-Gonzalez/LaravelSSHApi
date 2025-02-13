<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carnet extends Model
{
    use HasFactory;

    protected $table = 'carnet'; // Especificamos el nombre correcto de la tabla

    protected $fillable = ['tipo', 'fecha_expedicion', 'fecha_vencimiento'];

    public function conductores()
    {
        return $this->hasMany(Conductor::class, 'carnet_id');
    }
}

