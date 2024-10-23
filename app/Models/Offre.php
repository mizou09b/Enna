<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = ['numero', 'objetEn', 'objetAr', 'observation', 'user_id', 'date_Limite', 'date_proroge', 'pdf'];

}
