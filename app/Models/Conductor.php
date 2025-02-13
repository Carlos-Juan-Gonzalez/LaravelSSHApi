<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores';

    protected $fillable = ['nombre', 'apellido', 'dni', 'telefono', 'carnet_id'];

    public function carnet()
    {
        return $this->belongsTo(Carnet::class, 'carnet_id');
    }
}

