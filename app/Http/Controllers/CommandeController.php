<?php

namespace App\Http\Controllers;
use App\Models\CommandeEntete;
use App\Models\CommandeDetail;


use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function passerCommande(Request $request)
    {
        // Récupérer les données nécessaires de la requête
        $userId = auth()->id(); // ou $request->user()->id;
        $articleId = $request->input('article_id');
        $quantite = $request->input('quantite');
        $prixUnitaire = $request->input('prix');

        // Créer une nouvelle commande entête
        $commandeEntete = new CommandeEntete();
        $commandeEntete->date = now();
        $commandeEntete->id_clients = $userId;
        $commandeEntete->save();

        // Créer une nouvelle commande détail
        $commandeDetail = new CommandeDetail();
        $commandeDetail->id_num_commande = $commandeEntete->id;
        $commandeDetail->id_article = $articleId;
        $commandeDetail->id_quantite_commande = $quantite;
        $commandeDetail->prix_unitaire_brut = $prixUnitaire;
        // Calculez les autres valeurs si nécessaire
        $commandeDetail->save();

        // Vous pouvez également ajouter d'autres articles à la commande si nécessaire

        // Rediriger l'utilisateur ou retourner une réponse appropriée
    }
}
