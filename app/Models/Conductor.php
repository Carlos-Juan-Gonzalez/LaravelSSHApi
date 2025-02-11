<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conductor extends Model
{

  protected $table = 'conductores';
  protected $fillable = [
        'nia',
        'dni',
        'name',
        'phone',
        'location',
        'email',
    ];
}
