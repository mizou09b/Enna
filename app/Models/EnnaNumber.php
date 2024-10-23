<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnnaNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'Movements_Aerodromes', 'Aerodromes_Nationaux', 'Aerodromes_Internationaux', 'Survols'
    ];
}
