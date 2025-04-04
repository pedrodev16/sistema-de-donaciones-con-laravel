<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beneficiarios extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'discapacidad',
        'telefono',
        'cedula',
        'email',
        'fecha_nacimiento',
        'sexo',
        'edad',
        'estado_civil',
        'tipo_sangre',
        'enfermedades',
        'alergias',
        'id_usuario',
        'eliminado'
    ];
}
