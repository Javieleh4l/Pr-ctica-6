<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['titulo', 'autor', 'cantidad', 'estado'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }
}