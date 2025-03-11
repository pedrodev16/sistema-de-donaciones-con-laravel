<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicinas extends Model
{
    use HasFactory;
    //registro de  nombre, descripcion, tipo, presentacion, laboratorio
    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'presentacion',
        'laboratorio',
        'id_usuario',
        'dosis',
        'tipo_dosis'
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class, 'medicina_id');
    }
}
