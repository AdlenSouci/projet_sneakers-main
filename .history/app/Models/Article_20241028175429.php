<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_marque',
        'nom_marque',
        'nom_famille',
        'modele',
        'description',
        'prix_achat',
        'img',
        'nom_couleur',
        'prix_public',
        'id_famille',
        'id_article',

    ];

    public function tailles(): HasMany
    {
        return $this->hasMany(TaillesArticle::class);
    }

    // App\Models\Article.php
    public function marque()
    {
        return $this->belongsTo(Marque::class, 'id_marque');
    }
    public function avis()
    {
        return $this->hasMany(Avis::class, 'article_id'); // Assurez-vous que 'article_id' est la bonne clé
    }

    public function getMoyenneNoteAttribute()
    {
        return $this->avis->count() > 0 ? $this->avis->avg('note') : 0;
    }
}
