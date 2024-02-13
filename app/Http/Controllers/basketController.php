<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\TaillesArticle;
use App\Models\commande_detail;
use App\Models\commande_entete;

class BasketController extends Controller
{

    private function calculerPrixTotal($cartItems)
    {
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $totalPrice;
    }
    public function changerQuantiter(Request $request)
    {
        // Validation des données
        $request->validate([
            'article_id' => 'required|exists:articles,id',
            'quantity' => 'required|integer|min:0',
        ]);

        // Récupérer l'article à partir de la base de données
        $article = Article::findOrFail($request->article_id);

        // Récupérer le panier actuel depuis la session
        $cartItems = Session::get('cart', []);

        // Trouver l'index de l'article dans le panier
        $itemIndex = array_search($article->id, array_column($cartItems, 'id'));

        // Mettre à jour la quantité de l'article dans le panier
        if ($itemIndex !== false) {
            $cartItems[$itemIndex]['quantity'] = $request->quantity;

            // Mettre à jour le panier dans la session
            Session::put('cart', $cartItems);

            // Calculer le nouveau prix total
            $totalPrice = $this->calculerPrixTotal($cartItems);

            // Retourner une réponse JSON avec le message, le nouveau prix total et le panier mis à jour
            return response()->json([
                'message' => 'Quantité mise à jour avec succès',
                'totalPrice' => $totalPrice,
                'cart' => $cartItems,

            ]);
        }

        // Retourner une réponse JSON avec un message d'erreur si l'article n'est pas trouvé dans le panier
        return response()->json(['error' => 'Article non trouvé dans le panier']);
    }



    public function index()
    {
        // Récupérer les articles du panier depuis la session
        $cartItems = Session::get('cart', []);


        // Calculer le prix total
        $totalPrice = $this->calculerPrixTotal($cartItems);
        //$tailles = Article::find($cartItems->Id)->tailles();

        //return view('basket', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice, 'tailles' => $tailles]);
        return view('basket', ['cartItems' => $cartItems, 'totalPrice' => $totalPrice]);
    }




    public function ajouter_au_panier(Request $request)
    {
        // Validation des données
        $request->validate([
            'article_id' => 'required|exists:articles,id',
        ]);

        // Récupérer l'article à partir de la base de données
        $article = Article::findOrFail($request->article_id);

        // Récupérer les tailles associées à l'article
        $tailles = $article->tailles->pluck('taille');

        // Récupérer le panier actuel depuis la session
        $cartItems = Session::get('cart', []);

        // Vérifier si l'article est déjà dans le panier
        $existingItemKey = array_search($article->id, array_column($cartItems, 'id'));

        if ($existingItemKey !== false) {
            // L'article est déjà dans le panier, vous pouvez retourner une réponse pour indiquer que l'opération a été effectuée avec succès
            return response()->json(['message' => 'Article déjà dans le panier']);
        }

        // L'article n'est pas encore dans le panier, ajoutez-le avec une quantité de 1
        $cartItems[] = [
            'id' => $article->id,
            'name' => $article->modele,
            'image' => asset($article->img),
            'price' => $article->prix_public,
            'quantity' => 1,
            'tailles' => $tailles->toArray(),
        ];

        // Mettre à jour le panier dans la session
        Session::put('cart', $cartItems);

        // Calculer le nouveau prix total
        $totalPrice = $this->calculerPrixTotal($cartItems);

        // Retourner une réponse JSON avec le message et le nouveau prix total
        return response()->json(['message' => 'Article ajouté au panier avec succès', 'totalPrice' => $totalPrice]);
    }


    public function clearBasket()
    {
        // Supprimez le panier de la session
        Session::forget('cart');

        // Ajoutez également une nouvelle entrée vide dans la session pour forcer la mise à jour immédiate
        Session::put('cart', []);

        // Retournez une réponse JSON indiquant le succès de l'opération
        return response()->json(['message' => 'Le panier a été vidé avec succès']);
    }
    public function clearBasketArticle(Request $request)
    {
        // Validation des données
        $request->validate([
            'article_id' => 'required|exists:articles,id',
        ]);

        // Récupérer l'article à partir de la base de données
        $article = Article::findOrFail($request->article_id);

        // Récupérer le panier actuel depuis la session
        $cartItems = Session::get('cart', []);

        // Trouver l'index de l'article dans le panier
        $itemIndex = array_search($article->id, array_column($cartItems, 'id'));

        if ($itemIndex !== false) {
            // Retirer l'article du panier
            array_splice($cartItems, $itemIndex, 1);

            // Mettre à jour le panier dans la session
            Session::put('cart', $cartItems);

            // Calculer le nouveau prix total
            $totalPrice = $this->calculerPrixTotal($cartItems);

            // Retourner une réponse JSON avec le message, le nouveau prix total et le panier mis à jour
            return response()->json([
                'message' => 'Article supprimé avec succès',
                'totalPrice' => $totalPrice,
                'cart' => $cartItems,
            ]);
        }

        // Retourner une réponse JSON avec un message d'erreur si l'article n'est pas trouvé dans le panier
        return response()->json(['error' => 'Article non trouvé dans le panier']);
    }
    public function passerCommande()
    {
        // Vérifiez si l'utilisateur est authentifié
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Veuillez vous connecter pour passer une commande.');
        }

        // Créer l'en-tête de commande
        $commandeEntete = new commande_entete();
        $commandeEntete->date = now(); // Utilisez la date et l'heure actuelles
        $commandeEntete->id_clients = Auth::id(); // L'ID de l'utilisateur connecté
        $commandeEntete->save();

        // Enregistrer les détails de chaque article dans la commande
        $cartItems = Session::get('cart', []);
        foreach ($cartItems as $item) {
            $commandeDetail = new commande_detail();
            $commandeDetail->id_num_commande = $commandeEntete->id; // L'ID de la commande en-tête
            $commandeDetail->id_article = $item['id'];
            $commandeDetail->id_quantite_commmande = $item['quantity'];
            $commandeDetail->prix_unitaire_brut = $item['price'];
            $commandeDetail->prix_unitaire_net = $item['price'];
            $commandeDetail->montant_ht = $item['price'] * $item['quantity'];
            $commandeDetail->remise = 0;
            $commandeDetail->save();
        }

        // Effacez le panier après avoir passé la commande
        Session::forget('cart');

        return redirect()->route('basket')->with('success', 'Commande passée avec succès.');
    }
}
