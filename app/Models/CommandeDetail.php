<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CommandeDetail extends Model
{
    protected $table = 'commandes_details';

    protected $fillable = [
        'id_num_commande',
        'id_article',
        'id_quantite_commande',
        'prix_unitaire_brut',
        'quantite',
        //'prix_ttc',
        // Autres colonnes si nécessaire
    ];

    // Relation avec la table des entêtes de commande
    public function entete()
    {
        return $this->belongsTo(CommandeEntete::class, 'id_num_commande');
    }

    // Relation avec le modèle Article si vous stockez les informations de l'article commandé
    public function article()
    {
        return $this->belongsTo(Article::class, 'id_article');
    }
}
