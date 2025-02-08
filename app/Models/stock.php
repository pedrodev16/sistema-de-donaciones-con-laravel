<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock extends Model
{
    use HasFactory;
    protected $fillable = ['medicina_id', 'cantidad', 'ubicacion', 'observacion', 'estado'];

    public function medicina()
    {
        return $this->belongsTo(Medicinas::class, 'medicina_id');
    }
}
