<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donaciones extends Model
{
    use HasFactory;
    protected $fillable = [
        'beneficiario_id',
        'medicinas'
    ];

    public function beneficiario()
    {
        return $this->belongsTo(beneficiarios::class);
    }
}
