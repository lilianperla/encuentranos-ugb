<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'ubicacion',
        'foto'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
