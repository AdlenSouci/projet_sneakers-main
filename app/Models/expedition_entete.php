<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expedition_entete extends Model
{
    use HasFactory;
    protected $fillable = [
        'date','id_clients'];
}
