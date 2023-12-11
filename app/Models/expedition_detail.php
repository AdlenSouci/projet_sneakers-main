<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expedition_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'montant_ht','id_num_commande', 'remise'];
    
}
