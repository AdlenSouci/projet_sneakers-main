<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tva extends Model
{
    use HasFactory;
    protected $fillable = [
        'taux_tva'

    ];
}
