<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeEntete extends Model
{
    protected $table = 'commandes_entetes';

    protected $fillable = [
        'date',
        'id_clients',
        'id_num_commande',

        // Autres colonnes si nécessaire
    ];

    // Relation avec la table des détails de commande
    public function details()
    {
        return $this->hasMany(CommandeDetail::class, 'id_num_commande', 'id');
    }

    // Relation avec le modèle User si vous stockez les informations du client
    public function client()
    {
        return $this->belongsTo(User::class, 'id_clients');
    }
}
